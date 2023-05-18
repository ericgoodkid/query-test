<?php

namespace App\Http\Requests\Branch;

use App\Constants\BranchConstants;
use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            BranchConstants::CODE => [
                'string',
                'unique:r_branch,code'
            ],
            BranchConstants::ADDRESS => [
                'string'
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BranchConstants::CODE => strtoupper($this->get(BranchConstants::CODE, ''))
        ]);
    }
}
