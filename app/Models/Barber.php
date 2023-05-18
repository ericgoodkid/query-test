<?php

namespace App\Models;

use App\Constants\BarberConstants;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;

    protected $table = BarberConstants::TABLE_NAME;
    protected $primaryKey = BarberConstants::PK;

    protected $fillable = [
        BarberConstants::FIRST_NAME,
        BarberConstants::MIDDLE_NAME,
        BarberConstants::LAST_NAME,
        BarberConstants::NICKNAME,
    ];

}
