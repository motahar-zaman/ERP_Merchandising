<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColEmbroideryPrintingWashingToBudgetSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_sheets', function (Blueprint $table) {
            $table->string('embroidery_2')->after('embroidery')->nullable();
            $table->string('embroidery_3')->after('embroidery')->nullable();
            $table->string('printing_2')->after('printing')->nullable();
            $table->string('printing_3')->after('printing')->nullable();
            $table->string('washing_2')->after('washing')->nullable();
            $table->string('washing_3')->after('washing')->nullable();
            $table->string('washing_4')->after('washing')->nullable();
            $table->string('washing_5')->after('washing')->nullable();
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
            $table->dropColumn('embroidery_2');
            $table->dropColumn('embroidery_3');
            $table->dropColumn('printing_2');
            $table->dropColumn('printing_3');
            $table->dropColumn('washing_2');
            $table->dropColumn('washing_3');
            $table->dropColumn('washing_4');
            $table->dropColumn('washing_5');
        });
    }
}
