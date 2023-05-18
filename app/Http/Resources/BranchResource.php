<?php

namespace App\Http\Resources;

use App\Constants\BranchConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BranchConstants::PK      => $this->{BranchConstants::PK},
          BranchConstants::CODE    => $this->{BranchConstants::CODE},
          BranchConstants::ADDRESS => $this->{BranchConstants::ADDRESS}
        ];
    }
}