<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColFrontBackImageToBudgetSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_sheets', function (Blueprint $table) {
            $table->string('front_image')->after('specs')->nullable();
            $table->string('back_image')->after('specs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_sheets', function (Blueprint $table) {
            $table->dropColumn('front_image');
            $table->dropColumn('back_image');
        });
    }
}
