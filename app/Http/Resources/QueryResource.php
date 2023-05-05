<?php

namespace App\Http\Resources;

use App\Constants\QueryConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class QueryResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          QueryConstants::NORMAL_RESPONSE_KEY   => $this->resource[QueryConstants::NORMAL_RESPONSE_KEY],
          QueryConstants::REVERSED_RESPONSE_KEY => $this->resource[QueryConstants::REVERSED_RESPONSE_KEY]
        ];
    }
}