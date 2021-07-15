<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_summary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_date')->nullable();
            $table->string('merchant_team')->nullable();
            $table->int('unit_id')->nullable();
            $table->int('buyer_id')->nullable();
            $table->int('payment_term')->nullable();
            $table->string('front_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('item')->nullable();
            $table->int('style_id')->nullable();
            $table->string('spec_group')->nullable();
            $table->string('size_range')->nullable();
            $table->string('confirmation_date')->nullable();
            $table->string('po_issue_date')->nullable();
            $table->string('lc_contract_rcv_date')->nullable();
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
        Schema::dropIfExists('order_summary');
    }
}
