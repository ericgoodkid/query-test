<?php

namespace App\Services;

use App\Models\Barber;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

class BarberService
{
  public function index(array $aParameter): Collection
  {
    return Barber::all();
  }

  public function show(int $iId): Branch
  {
    return Barber::find($iId);
  }
  
  public function store(array $aFields): Branch
  {
    return Barber::create($aFields);
  }

  public function update(int $iId, array $aFields): Branch
  {
    $oBarber = Barber::find($iId);
    $oBarber->update($aFields);
    return $oBarber;
  }

}
