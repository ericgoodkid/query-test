<?php

namespace App\Models;

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoCrossedOut extends Model
{
    use HasFactory;
    protected $table = BingoCrossedoutConstants::TABLE_NAME;
    protected $primaryKey = BingoCrossedoutConstants::PK;

    protected $fillable = [
        BingoConstants::PK,
        BingoCrossedoutConstants::VALUE
    ];
}
