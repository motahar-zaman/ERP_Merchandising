<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelBookingDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('label_booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('label_booking_id');
            $table->string('desc')->nullable();
            $table->string('color')->nullable();
            $table->string('upc')->nullable();
            $table->string('retail_price')->nullable();
            $table->string('size')->nullable();
            $table->string('gmnts_qty')->nullable();
            $table->string('percentage')->nullable();
            $table->string('book_qty')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('label_booking_details');
    }
}
