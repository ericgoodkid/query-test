<?php

namespace App\Http\Resources;

use App\Constants\BingoDrawConstants;
use App\Constants\CommonConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class BingoDrawResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BingoDrawConstants::VALUE   =>  $this->{BingoDrawConstants::VALUE},
          CommonConstants::CREATED_AT => $this->{CommonConstants::CREATED_AT}
        ];
    }
}