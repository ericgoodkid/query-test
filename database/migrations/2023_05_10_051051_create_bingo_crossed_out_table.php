<?php

use App\Constants\BingoConstants;
use App\Constants\BingoCrossedoutConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBingoCrossedOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BingoCrossedoutConstants::TABLE_NAME, function (Blueprint $table) {
            $table->increments(BingoCrossedoutConstants::PK);
            $table->foreignId(BingoConstants::PK);
            $table->unsignedInteger(BingoCrossedoutConstants::VALUE);
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
        Schema::table(BingoCrossedoutConstants::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign([BingoConstants::PK]);
        });
        Schema::dropIfExists(BingoCrossedoutConstants::TABLE_NAME);
    }
}
