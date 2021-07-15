<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('label_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to')->nullable();
            $table->string('attn')->nullable();
            $table->string('sub')->nullable();
            $table->string('date')->nullable();
            $table->unsignedInteger('budget_sheet_id')->nullable();
            $table->string('label_style')->nullable();
            $table->string('buyer_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('label_bookings');
    }
}
