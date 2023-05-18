<?php

use App\Constants\BarberConstants;
use App\Constants\BranchConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BarberConstants::TABLE_NAME, function (Blueprint $table) {
            $table->increments(BarberConstants::PK);
            $table->string(BarberConstants::FIRST_NAME);
            $table->string(BarberConstants::MIDDLE_NAME)->nullable();
            $table->string(BarberConstants::LAST_NAME);
            $table->string(BarberConstants::NICKNAME);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BarberConstants::TABLE_NAME);
    }
}
