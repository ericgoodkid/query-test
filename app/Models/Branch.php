<?php

namespace App\Models;

use App\Constants\BranchConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = BranchConstants::TABLE_NAME;
    protected $primaryKey = BranchConstants::PK;

    protected $fillable = [
        BranchConstants::CODE,
        BranchConstants::ADDRESS
    ];
}
