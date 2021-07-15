<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColPaymentTermsToCostBreakdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_breakdowns', function (Blueprint $table) {
            $table->string('payment_terms')->after('style')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_breakdowns', function (Blueprint $table) {
            $table->dropColumn('payment_terms');

        });
    }
}
