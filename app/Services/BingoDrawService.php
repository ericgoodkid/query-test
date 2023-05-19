<?php

namespace App\Services;

use App\Constants\BingoConstants;
use App\Constants\BingoDrawConstants;
use App\Models\BingoDraw;
use Illuminate\Validation\ValidationException;

class BingoDrawService
{
  public function store(int $iBingoNo)
  {
    $aBingoDraw = BingoDraw::where(BingoConstants::PK, $iBingoNo)->pluck(BingoDrawConstants::VALUE)->toArray();
    // If this is true, it will throw an error since all the number has been drawn
    if (count($aBingoDraw) === 85) {
      throw ValidationException::withMessages([
        BingoDrawConstants::VALUE => 'All the drawable combination has been drawn'  
      ]);
    }

    $iRandomDraw = $this->drawRandomNumber($aBingoDraw);
    return BingoDraw::create([
      BingoConstants::PK        => $iBingoNo,
      BingoDrawConstants::VALUE => $iRandomDraw
    ]);
  }

  /**
   * Use to draw unique random number
   */
  private function drawRandomNumber(array $aBingoDraw): int
  {
    $iRandomDraw = rand(1, 85);
    if (in_array($iRandomDraw, $aBingoDraw) === true) {
      return $this->drawRandomNumber($aBingoDraw);
    }

    return $iRandomDraw;
  }
}
