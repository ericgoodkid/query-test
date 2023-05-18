<?php

namespace App\Http\Requests\Barber;

use App\Constants\BarberConstants;
use Illuminate\Foundation\Http\FormRequest;

class PatchBarberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            BarberConstants::PK  => [
                'required',
                'int',
                'exists:r_branch,branch_no'
            ],
            BarberConstants::FIRST_NAME => [
                'required',
                'string',
            ],
            BarberConstants::MIDDLE_NAME => [
                'optional',
                'string',
            ],
            BarberConstants::LAST_NAME => [
                'required',
                'string',
            ],
            BarberConstants::NICKNAME => [
                'required',
                'string',
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BarberConstants::PK          => $this->route('branch'),
            BarberConstants::FIRST_NAME  => strtolower($this->get(BarberConstants::FIRST_NAME, '')),
            BarberConstants::MIDDLE_NAME => $this->get(BarberConstants::MIDDLE_NAME, '') === '' ?? null,
            BarberConstants::LAST_NAME   => strtolower($this->get(BarberConstants::LAST_NAME, '')),
            BarberConstants::NICKNAME    => strtolower($this->get(BarberConstants::NICKNAME, '')),
        ]);
    }
}
