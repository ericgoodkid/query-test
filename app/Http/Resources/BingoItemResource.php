<?php

namespace App\Http\Resources;

use App\Constants\BingoItemConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class BingoItemResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BingoItemConstants::ITEM  => $this->{BingoItemConstants::ITEM},
          BingoItemConstants::VALUE => $this->{BingoItemConstants::VALUE}
        ];
    }
}