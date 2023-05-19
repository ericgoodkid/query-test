<?php

namespace App\Models;

use App\Constants\BingoConstants;
use App\Constants\BingoDrawConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoDraw extends Model
{
    use HasFactory;
    protected $table = BingoDrawConstants::TABLE_NAME;
    protected $primaryKey = BingoDrawConstants::PK;

    protected $fillable = [
        BingoConstants::PK,
        BingoDrawConstants::VALUE
    ];
}
