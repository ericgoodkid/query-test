<?php

namespace App\Services;

use App\Constants\QueryConstants;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class QueryService
{
  public function getQueryResponse(string $sQuery): array
  {
    $aErrorResponse = [
      'invalid_body' => 'The body of the response is not json'
    ];

    $oRequest = Http::get($sQuery);
    if (!$oRequest->ok()) {
      throw ValidationException::withMessages($aErrorResponse);
    }

    $mResponse = $oRequest->json();
    if ($mResponse === null) {
      throw ValidationException::withMessages($aErrorResponse);
    }

    return [
      QueryConstants::NORMAL_RESPONSE_KEY   => $mResponse,
      QueryConstants::REVERSED_RESPONSE_KEY => $this->reverseResponse($mResponse)
    ];
  }

  private function reverseResponse(array $aResponse): array
  {
    $aTempResponse = [];
    foreach(array_reverse($aResponse) as $sKey => $mVal) {
      $aTempResponse[strrev($sKey)] = $this->getReversableValue($mVal);
    }

    return $aTempResponse;
  }

  private function getReversableValue($mVal)
  {
    if ($mVal === null) {
      return null;
    } else if (gettype($mVal) === 'object' || gettype($mVal) === 'array') {
      return $this->reverseResponse($mVal);
    }

    return strrev($mVal);
  }
}
