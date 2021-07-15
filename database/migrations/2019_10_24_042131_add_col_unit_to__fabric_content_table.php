<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColUnitToFabricContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_break_down_fabric_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->after('fabric_consumption')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_break_down_fabric_contents', function (Blueprint $table) {
            $table->dropColumn('unit_id');
        });
    }
}
