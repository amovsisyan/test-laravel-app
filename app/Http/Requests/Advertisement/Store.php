<?php

namespace App\Http\Requests\Advertisement;

use App\Constants\DBTablesConstants;
use App\Http\Requests\ApiRequestCombined;

class Store extends ApiRequestCombined
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
            'title' => ['required', 'string', 'max:' . DBTablesConstants::ADVERTISEMENTS_TABLE_MAX_LENGTHS['title']],
            'description' => ['required', 'string', 'max:' . DBTablesConstants::ADVERTISEMENTS_TABLE_MAX_LENGTHS['description']],
            'photos' => ['array'],
            'photos.*' => ['mimes:jpeg,jpg,png', 'max:5120'],
        ];
    }
}
