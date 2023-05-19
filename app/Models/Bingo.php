<?php

namespace App\Models;

use App\Constants\BingoConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bingo extends Model
{
    use HasFactory;
    protected $table = BingoConstants::TABLE_NAME;
    protected $primaryKey = BingoConstants::PK;

    public function bingoItems(): HasMany
    {
        return $this->hasMany(BingoItem::class, BingoConstants::PK);
    }

    public function bingoDraws(): HasMany
    {
        return $this->hasMany(BingoDraw::class, BingoConstants::PK);
    }

    public function crossedOut(): HasMany
    {
        return $this->hasMany(BingoCrossedOut::class, BingoConstants::PK);
    }

}
