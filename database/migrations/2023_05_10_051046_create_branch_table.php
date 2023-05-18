<?php

use App\Constants\BranchConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BranchConstants::TABLE_NAME, function (Blueprint $table) {
            $table->increments(BranchConstants::PK);
            $table->string(BranchConstants::CODE)->unique();
            $table->text(BranchConstants::ADDRESS);
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
        Schema::dropIfExists(BranchConstants::TABLE_NAME);
    }
}
