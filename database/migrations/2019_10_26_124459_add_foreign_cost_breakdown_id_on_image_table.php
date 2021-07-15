<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCostBreakdownIdOnImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_breakdown_images', function (Blueprint $table) {
            $table->foreign('cost_breakdown_id')->references('id')->on('cost_breakdowns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_breakdown_images', function (Blueprint $table) {
            $table->dropForeign(['cost_breakdown_id']);

        });
    }
}
