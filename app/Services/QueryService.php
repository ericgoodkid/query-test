<?php

namespace App\Services;

use App\Constants\QueryConstants;

class QueryService
{  
  /**
   * Return the  
   *
   * @param  mixed $fNumber
   * @return array
   */
  public function index(float $fNumber): array
  {
    $fNumber = str_replace(',', '', $fNumber);
    $fNumber = number_format($fNumber, 2, '.', '');
    $aNumber = explode('.', $fNumber);
    $fWholeNumber = (float) $aNumber[0];
    $fCent = (float) $aNumber[1];

    $sWholeNumber = "{$this->getNumberToWords($fWholeNumber)} DOLLARS";
    return [
      QueryConstants::WORDS => (int) $fCent === 0 ? $sWholeNumber : "{$sWholeNumber} AND {$this->getNumberToWords($fCent)} CENTS"
    ];
  }
 
  /**
   * Used to get the converted value of number to words
   *
   * @param  mixed $fNumber
   * @return string
   */
  function getNumberToWords(float $fNumber): string
  {
    $aOne = [
      0 => 'ZERO',
      1 => 'ONE',
      2 => 'TWO',
      3 => 'THREE',
      4 => 'FOUR',
      5 => 'FIVE',
      6 => 'SIX',
      7 => 'SEVEN',
      8 => 'EIGHT',
      9 => 'NINE',
      10 => 'TEN',
      11 => 'ELEVEN',
      12 => 'TWELVE',
      13 => 'THIRTEEN',
      14 => 'FOURTEEN',
      15 => 'FIFTEEN',
      16 => 'SIXTEEN',
      17 => 'SEVENTEEN',
      18 => 'EIGHTEEN',
      19 => 'NINETEEN'
    ];

    $aTen = [
      2 => 'TWENTY',
      3 => 'THIRTY',
      4 => 'FORTY',
      5 => 'FIFTY',
      6 => 'SIXTY',
      7 => 'SEVENTY',
      8 => 'EIGHTY',
      9 => 'NINETY'
    ];

    $aHundred = [
      'HUNDRED',
      'THOUSAND',
      'MILLION',
      'BILLION',
      // ...
    ];

    $sWord = '';

    if ($fNumber < 20) {
      $sWord = $aOne[$fNumber];
    } elseif ($fNumber < 100) {
      $sWord = $aTen[floor($fNumber / 10)];
      $iRemainder = $fNumber % 10;
      $sWord = ($iRemainder > 0) ? $sWord . '-' . $this->getNumberToWords($iRemainder) : $sWord;
    } elseif ($fNumber < 1000) {
      $sWord = $this->getNumberToWords(floor($fNumber / 100)) . ' ' . $aHundred[0];
      $iRemainder = $fNumber % 100;
      $sWord = ($iRemainder > 0) ? $sWord . ' ' . $this->getNumberToWords($iRemainder) : $sWord;
    } else {
      $fBaseUnit = pow(1000, floor(log($fNumber, 1000)));
      $fHundredUnit = floor($fNumber / $fBaseUnit);
      $iRemainder = $fNumber % $fBaseUnit;

      $sWord = $this->getNumberToWords($fHundredUnit) . ' ' . $aHundred[floor(log($fBaseUnit, 1000))];
      $sWord = ($iRemainder > 0) ? $sWord . ' ' . $this->getNumberToWords($iRemainder) : $sWord;
    }

    return $sWord;
  }
}
