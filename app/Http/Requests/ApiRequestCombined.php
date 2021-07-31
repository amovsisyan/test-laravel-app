<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequestCombined extends FormRequest
{
    public function expectsJson()
    {
        return true;
    }

    /**
     * Add Route parameter to validation
     *
     * @return array
     */
    public function all($keys = null)
    {
        $routeParamsMergedWithRequest =  array_replace_recursive(
            parent::all($keys),
            $this->route()->parameters()
        );

        return $routeParamsMergedWithRequest;
    }
}
