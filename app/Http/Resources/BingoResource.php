<?php

namespace App\Http\Resources;

use App\Constants\BingoConstants;
use App\Constants\BingoItemConstants;
use App\Constants\CommonConstants;
use App\Models\Bingo;
use Illuminate\Http\Resources\Json\JsonResource;

class BingoResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BingoConstants::PK          => $this->{BingoConstants::PK},
          CommonConstants::CREATED_AT => $this->{CommonConstants::CREATED_AT},
          BingoConstants::BINGO_ITEM  => BingoItemResource::collection($this->bingoItems),
          BingoConstants::CROSSED_OUT => BingoCrossedoutResource::collection($this->crossedOut),
          BingoConstants::BINGO_DRAW  => BingoDrawResource::collection($this->bingoDraws)
        ];
    }
}