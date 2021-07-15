<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignLabelBooking extends Migration
{
    public function up()
    {
        Schema::table('label_bookings', function (Blueprint $table) {
            $table->foreign('budget_sheet_id')->references('id')->on('budget_sheets');

        });
    }

    public function down()
    {
        Schema::table('label_bookings', function (Blueprint $table) {
            $table->dropForeign(['budget_sheet_id']);

        });
    }
}
