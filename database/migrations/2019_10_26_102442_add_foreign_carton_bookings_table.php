<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCartonBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carton_booking_details', function (Blueprint $table) {
            $table->foreign('carton_bookings_id')->references('id')->on('carton_bookings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carton_booking_details', function (Blueprint $table) {
            $table->dropForeign(['carton_bookings_id']);
        });
    }
}
