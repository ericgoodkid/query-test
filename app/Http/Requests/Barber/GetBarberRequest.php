<?php

namespace App\Http\Requests\Barber;

use App\Constants\BarberConstants;
use Illuminate\Foundation\Http\FormRequest;

class GetBarberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            BarberConstants::PK => [
                'required',
                'int',
                'exists:r_barber,barber_no'
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BarberConstants::PK => $this->route('barber')
        ]);
    }
}
