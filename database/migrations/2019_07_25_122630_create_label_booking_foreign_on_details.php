<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelBookingForeignOnDetails extends Migration
{

    public function up()
    {
        Schema::table('label_booking_details', function (Blueprint $table) {
            $table->foreign('label_booking_id')->references('id')->on('label_bookings');

        });
    }

    public function down()
    {
        Schema::table('label_booking_details', function (Blueprint $table) {
            $table->dropForeign(['label_booking_id']);
        });
    }
}
