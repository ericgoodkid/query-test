<?php

namespace App\Http\Requests;

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use App\Http\Rules\BingoItemExistRule;
use App\Http\Rules\DrawExistRule;
use App\Http\Rules\UniqueCrossoutValueRule;
use Illuminate\Foundation\Http\FormRequest;

class PostCrosssoutRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $iBingoNo = (int) $this->route('bingo');
        return [
            BingoConstants::PK => [
                'int',
                'required',
                'exists:t_bingo,bingo_no'
            ],
            BingoCrossedoutConstants::VALUE => [
                'int',
                'required',
                new BingoItemExistRule($iBingoNo),
                new DrawExistRule($iBingoNo),
                new UniqueCrossoutValueRule($iBingoNo)
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            BingoConstants::PK              => $this->route('bingo'),
            BingoCrossedoutConstants::VALUE => $this->route('crossout')
        ]);
    }
}
