<?php

namespace App\Http\Requests\Advertisement;

use App\Http\Requests\ApiRequestCombined;
use Illuminate\Validation\Rule;

class Destroy extends ApiRequestCombined
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'advertisement' => ['required', 'integer', Rule::exists('advertisements', 'id')]
        ];
    }
}
