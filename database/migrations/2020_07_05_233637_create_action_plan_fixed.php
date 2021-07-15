<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionPlanFixed extends Migration
{

    public function up()
    {
        Schema::create('action_plan_fixed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_date')->nullable();
            $table->string('merchant_team')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('payment_term')->nullable();
            $table->string('front_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('item')->nullable();
            $table->string('style_name')->nullable();
            $table->string('spec_group')->nullable();
            $table->string('size_range')->nullable();
            $table->string('confirmation_date')->nullable();
            $table->string('po_issue_date')->nullable();
            $table->string('lc_contract_rcv_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('action_plan_fixed');
    }
}
