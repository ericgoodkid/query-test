<?php

namespace App\Http\Resources;

use App\Constants\BarberConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class BarberResource extends JsonResource
{
    public function toArray($oRequest)
    {
        return [
          BarberConstants::PK          => $this->{BarberConstants::PK},
          BarberConstants::FIRST_NAME  => $this->{BarberConstants::FIRST_NAME},
          BarberConstants::MIDDLE_NAME => $this->{BarberConstants::MIDDLE_NAME},
          BarberConstants::LAST_NAME   => $this->{BarberConstants::LAST_NAME},
          BarberConstants::NICKNAME    => $this->{BarberConstants::NICKNAME}
        ];
    }
}