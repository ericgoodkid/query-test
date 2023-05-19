<?php

namespace App\Services;

use App\Constants\BingoConstants;
use App\Constants\BingoItemConstants;
use App\Models\Bingo;
use App\Models\BingoItem;
use Illuminate\Database\Eloquent\Collection;

class BingoService
{

  public function store(): Bingo
  {
    $aGeneratedBingoCard = $this->generateBingoCard();
    $iBingoCardNo = $this->saveBingoCard($aGeneratedBingoCard);
    return $this->getBingoByNo($iBingoCardNo);
  }

  public function index(): Collection
  {
    return Bingo::all();
  }

  public function show(int $iBingoCardNo): Bingo
  {
    return $this->getBingoByNo($iBingoCardNo);
  }

  /**
   * Find the bingo by given bingo no
   */
  private function getBingoByNo(int $iBingoCardNo): Bingo
  {
    return Bingo::with(BingoConstants::DEFAULT_RELATIONSHIP)->find($iBingoCardNo);
  }

  /**
   * Use to save a bingo card
   */
  private function saveBingoCard(array $aBingoCard): int
  {
    $oBingo = Bingo::create();
    $iBingoCardNo = $oBingo->{BingoConstants::PK};
    BingoItem::insert(
      $this->prepareBingoForSaving($iBingoCardNo, $aBingoCard)
    );

    return $iBingoCardNo;
  }

  /**
   * Use to generate Bingo Card
   */
  private function generateBingoCard(): array
  {
    $aBingoCardConstraint = [
      BingoItemConstants::CARD_FIRST_KEY => [
        BingoItemConstants::MIN_KEY => 1,
        BingoItemConstants::MAX_KEY => 25,
      ],
      BingoItemConstants::CARD_SECOND_KEY => [
        BingoItemConstants::MIN_KEY => 26,
        BingoItemConstants::MAX_KEY => 40,
      ],
      BingoItemConstants::CARD_THIRD_KEY => [
        BingoItemConstants::MIN_KEY => 41,
        BingoItemConstants::MAX_KEY => 55,
      ],
      BingoItemConstants::CARD_FOURTH_KEY => [
        BingoItemConstants::MIN_KEY => 56,
        BingoItemConstants::MAX_KEY => 70,
      ],
      BingoItemConstants::CARD_FIFTH_KEY => [
        BingoItemConstants::MIN_KEY => 71,
        BingoItemConstants::MAX_KEY => 85,
      ]
    ];

    $aBingoCard = [];
    foreach ($aBingoCardConstraint as $sKey => $oValue) {
      $aBingoCard[$sKey] = $this->generateNumberRange(
        $oValue[BingoItemConstants::MIN_KEY], $oValue[BingoItemConstants::MAX_KEY]
      );
    }

   return $aBingoCard;
  }

  /**
   * Use to generate range of numbers based on given length
   */
  private function generateNumberRange(int $iMinimum, int $iMaximum, int $iLength = 5): array
  {
    $aGeneratedNumber = [];
    for ($iCounter = 0; $iCounter < $iLength; $iCounter++) {
      $aGeneratedNumber[] = $this->generateNumber($iMinimum, $iMaximum, $aGeneratedNumber);
    }

    return $aGeneratedNumber;
  }

  /**
   * Used to generate number
   * Have a checker if the number is already exist in the list
   */
  private function generateNumber(int $iMinimum, int $iMaximum, array $aGeneratedNumber): int
  {
    $iGeneratedNumber = rand($iMinimum, $iMaximum);
    if (in_array($iGeneratedNumber, $aGeneratedNumber) === true) {
      return $this->generateNumber($iMinimum, $iMaximum, $aGeneratedNumber);
    }

    return $iGeneratedNumber;
  }

  /**
   * Used to format the array to follow the format of create many of eloquent
   */
  private function prepareBingoForSaving(int $iBingoCardId, array $aBingoCard): array
  {
    $aPreparedBingoCard = [];
    foreach ($aBingoCard as $sKey => $aItem) {
      foreach ($aItem as $iBingoNumber) {
        $aPreparedBingoCard[] = [
          BingoConstants::PK        => $iBingoCardId,
          BingoItemConstants::ITEM  => $sKey,
          BingoItemConstants::VALUE => $iBingoNumber,
        ];
      }
    }

    return $aPreparedBingoCard;
  }

}
