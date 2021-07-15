<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lc_factory')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->integer('style_id')->nullable();
            $table->string('item')->nullable();
            $table->string('merchandiser')->nullable();
            $table->string('merchandiser_head')->nullable();
            $table->string('sketch_or_sample')->nullable();
            $table->string('smv')->nullable();
            $table->string('quantity')->nullable();
            $table->string('order_season')->nullable();
            $table->string('input_date')->nullable();
            $table->string('ex_factory')->nullable();
            $table->string('wash')->nullable();
            $table->string('emblishment')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('booking_plan');
    }
}
