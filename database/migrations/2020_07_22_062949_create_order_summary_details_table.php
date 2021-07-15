<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSummaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_summary_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('order_summary_id')->nullable();
            $table->string('color_name')->nullable();
            $table->string('fob_price_pcs')->nullable();
            $table->string('cm_price_pcs')->nullable();
            $table->string('quantity_pcs')->nullable();
            $table->string('ship_date')->nullable();
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
        Schema::dropIfExists('order_summary_details');
    }
}
