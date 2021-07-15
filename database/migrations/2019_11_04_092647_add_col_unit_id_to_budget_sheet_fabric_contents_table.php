<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColUnitIdToBudgetSheetFabricContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_sheet_fabric_contents', function (Blueprint $table) {
            $table->Integer('unit_id')->after('fabric_consumption')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_sheet_fabric_contents', function (Blueprint $table) {
            $table->dropColumn('unit_id');
        });
    }
}
