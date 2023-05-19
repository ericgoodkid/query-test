<?php

namespace App\Models;

use App\Constants\BingoConstants;
use App\Constants\BingoItemConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BingoItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = BingoItemConstants::TABLE_NAME;
    protected $primaryKey = BingoItemConstants::PK;

    protected $fillable = [
        BingoConstants::PK,
        BingoItemConstants::ITEM,
        BingoItemConstants::VALUE
    ];
}
