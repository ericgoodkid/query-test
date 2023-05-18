<?php

namespace App\Http\Requests\Branch;

use App\Constants\BranchConstants;
use Illuminate\Foundation\Http\FormRequest;

class PatchBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            BranchConstants::PK => [
                'required',
                'int',
                'exists:r_branch,branch_no'
            ],
            BranchConstants::CODE => [
                'required',
                'string',
                'unique:r_branch,code'
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BranchConstants::PK   => $this->route('branch'),
            BranchConstants::CODE => strtoupper($this->get(BranchConstants::CODE, ''))
        ]);
    }

    
}
