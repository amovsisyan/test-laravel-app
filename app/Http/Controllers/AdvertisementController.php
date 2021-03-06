<?php

namespace App\Http\Controllers;

use App\Http\Requests\Advertisement\Destroy;
use App\Http\Requests\Advertisement\Store;
use App\Http\Requests\Advertisement\Show;
use App\Http\Requests\Advertisement\Update;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $entities = Advertisement::with('photos')->get();

        return response()->json($entities);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Store $request)
    {
        $createData = $request->only('title', 'description');
        $new = Advertisement::create($createData);
        $instancePhotos = $new->photos();

        if (isset($request->photos)) {
            foreach ($request->photos as $photo) {
                $uploadedLink = Storage::disk('public')->put($new->id, $photo);
                $instancePhotos->create(['url' => $uploadedLink]);
            }
        }

        return response()->json(Advertisement::with('photos')->find($new->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Show $request)
    {
        $id = $request->advertisement;
        $entity = Advertisement::with('photos')->find($id);

        return response()->json($entity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Update $request)
    {
        $id = $request->advertisement;
        $entity = Advertisement::find($id);
        $updateData = $request->only('title', 'description');
        $entity->update($updateData);
        $instancePhotos = $entity->photos();

        if (isset($request->photos)) {
            foreach ($request->photos as $photo) {
                $uploadedLink = Storage::disk('public')->put($entity->id, $photo);
                $instancePhotos->create(['url' => $uploadedLink]);
            }
        }

        return response()->json(Advertisement::with('photos')->find($entity->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Destroy $request)
    {
        $id = $request->advertisement;
        $entity = Advertisement::find($id)->delete();

        return response()->json(['deleted' => $entity]);
    }
}
