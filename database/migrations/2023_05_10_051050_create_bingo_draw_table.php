<?php

use App\Constants\BingoConstants;
use App\Constants\BingoDrawConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBingoDrawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BingoDrawConstants::TABLE_NAME, function (Blueprint $table) {
            $table->increments(BingoDrawConstants::PK);
            $table->foreignId(BingoConstants::PK);
            $table->unsignedInteger(BingoDrawConstants::VALUE);
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
        Schema::table(BingoDrawConstants::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign([BingoConstants::PK]);
        });
        Schema::dropIfExists(BingoDrawConstants::TABLE_NAME);
    }
}
