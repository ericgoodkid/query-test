<?php
namespace App\Http\Rules;

use App\Constants\BingoConstants;
use App\Constants\BingoItemConstants;
use Illuminate\Contracts\Validation\Rule;
use App\Models\BingoItem;

class BingoItemExistRule implements Rule
{
    protected $iBingoId;

    public function __construct($iBingoId)
    {
        $this->iBingoId = $iBingoId;
    }

    public function passes($attribute, $value)
    {
        // Check if the value exists in the Bingo Item table for the given Bingo ID
        return BingoItem::where(BingoConstants::PK, $this->iBingoId)
            ->where(BingoItemConstants::VALUE, $value)
            ->exists();
    }

    public function message()
    {
        return 'The number is not present in your card.';
    }
}