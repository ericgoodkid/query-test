<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

class BranchService
{
  public function index(array $aParameter): Collection
  {
    return Branch::all();
  }

  public function show(int $iId): Branch
  {
    return Branch::find($iId);
  }
  
  public function store(array $aFields): Branch
  {
    return Branch::create($aFields);
  }

  public function update(int $iId, array $aFields): Branch
  {
    $oBranch = Branch::find($iId);
    $oBranch->update($aFields);
    return $oBranch;
  }

}
