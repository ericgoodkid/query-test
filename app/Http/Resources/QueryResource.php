<?php

namespace App\Http\Resources;

use App\Constants\QueryConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class QueryResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          QueryConstants::WORDS   => $this->resource[QueryConstants::WORDS]
        ];
    }
}