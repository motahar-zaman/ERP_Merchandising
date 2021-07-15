<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColWidthWeightToFabricContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_break_down_fabric_contents', function (Blueprint $table) {
            $table->string('fabric_width')->after('id')->nullable();
            $table->string('fabric_weight')->after('cost_breakdown_id')->nullable();
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
            $table->dropColumn('fabric_width');
            $table->dropColumn('fabric_weight');
        });
    }
}
