<?php
namespace App\Http\Rules;

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use Illuminate\Contracts\Validation\Rule;
use App\Models\BingoDraw;

class DrawExistRule implements Rule
{
    protected $iBingoId;

    public function __construct($iBingoId)
    {
        $this->iBingoId = $iBingoId;
    }

    public function passes($attribute, $value)
    {
        // Check if the value exists in the BingoDraw table for the given Bingo ID
        return BingoDraw::where(BingoConstants::PK, $this->iBingoId)
            ->where(BingoCrossedoutConstants::VALUE, $value)
            ->exists();
    }

    public function message()
    {
        return 'The combination is not present in the current draw';
    }
}