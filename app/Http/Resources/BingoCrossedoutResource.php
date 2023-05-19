<?php

namespace App\Http\Resources;

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use App\Constants\CommonConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class BingoCrossedoutResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BingoConstants::PK              => $this->{BingoConstants::PK},
          BingoCrossedoutConstants::VALUE => $this->{BingoCrossedoutConstants::VALUE},
          CommonConstants::CREATED_AT     => $this->{CommonConstants::CREATED_AT}
        ];
    }
}