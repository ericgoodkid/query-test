<?php

namespace App\Http\Requests\Branch;

use App\Constants\BranchConstants;
use Illuminate\Foundation\Http\FormRequest;

class GetBranchRequest extends FormRequest
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
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BranchConstants::PK => $this->route('branch')
        ]);
    }
}
