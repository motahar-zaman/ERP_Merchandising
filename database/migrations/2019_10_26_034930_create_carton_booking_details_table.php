<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartonBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carton_booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carton_bookings_id');
            $table->string('style')->nullable();
            $table->string('gmts_size')->nullable();
            $table->string('ord_type')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('type_of_carton')->nullable();
            $table->string('gmnts_qty')->nullable();
            $table->string('pcs_per_carton')->nullable();
            $table->string('req_qty')->nullable();
            $table->string('percentage')->nullable();
            $table->string('book_qty')->nullable();
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
        Schema::dropIfExists('carton_booking_details');
    }
}
