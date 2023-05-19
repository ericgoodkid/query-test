<?php

use App\Constants\BingoConstants;
use App\Constants\BingoItemConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBingoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BingoItemConstants::TABLE_NAME, function (Blueprint $table) {
            $table->increments(BingoItemConstants::PK);
            $table->foreignId(BingoConstants::PK);
            $table->char(BingoItemConstants::ITEM, 1);
            $table->unsignedInteger(BingoItemConstants::VALUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(BingoItemConstants::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign([BingoConstants::PK]);
        });
        Schema::dropIfExists(BingoItemConstants::TABLE_NAME);
    }
}
