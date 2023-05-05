<?php

namespace App\Http\Requests\Query;

use App\Constants\QueryConstants;
use Illuminate\Foundation\Http\FormRequest;

class GetQueryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            QueryConstants::QUERY_KEY => [
                'required',
                'string',
                'active_url'
            ]
        ];
    }
}
