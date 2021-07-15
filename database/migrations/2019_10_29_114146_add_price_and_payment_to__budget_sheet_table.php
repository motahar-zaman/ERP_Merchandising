<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceAndPaymentToBudgetSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_sheets', function (Blueprint $table) {
            $table->Integer('quote_id')->after('size_range')->nullable();
            $table->string('payment_terms')->after('specs')->nullable();

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
            $table->dropColumn('quote_id');
            $table->dropColumn('payment_terms');
        });
    }
}
