<?php

namespace App\Http\Requests\Barber;

use App\Constants\BarberConstants;
use App\Constants\BranchConstants;
use Illuminate\Foundation\Http\FormRequest;

class StoreBarberRequest extends FormRequest
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
            BarberConstants::FIRST_NAME  => strtolower($this->get(BarberConstants::FIRST_NAME, '')),
            BarberConstants::MIDDLE_NAME => $this->get(BarberConstants::MIDDLE_NAME, '') === '' ?? null,
            BarberConstants::LAST_NAME   => strtolower($this->get(BarberConstants::LAST_NAME, '')),
            BarberConstants::NICKNAME    => strtolower($this->get(BarberConstants::NICKNAME, '')),
        ]);
    }
}
