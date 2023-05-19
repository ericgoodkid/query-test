<?php

namespace App\Services;

use App\Models\BingoCrossedOut;

class BingoCrossedOutService
{

  public function update(array $aParameter): BingoCrossedOut
  {
    return BingoCrossedOut::create($aParameter);
  }


}
