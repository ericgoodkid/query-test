<?php
namespace App\Http\Rules;

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use App\Models\BingoCrossedOut;
use Illuminate\Contracts\Validation\Rule;

class UniqueCrossoutValueRule implements Rule
{
    protected $iBingoId;

    public function __construct($iBingoId)
    {
        $this->iBingoId = $iBingoId;
    }

    public function passes($attribute, $value)
    {
        // Check if the value exists in the Bingo Crossout table for the given Bingo ID
        return !BingoCrossedOut::where(BingoConstants::PK, $this->iBingoId)
                ->where(BingoCrossedoutConstants::VALUE, $value)
                ->exists();
    }

    public function message()
    {
        return 'The combination is already existing in your list.';
    }
}