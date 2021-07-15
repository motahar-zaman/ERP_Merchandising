<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsTnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrics_tna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('order_summary_style')->nullable();
            $table->string('color_name')->nullable();
            $table->string('shell_booking_date')->nullable();
            $table->string('shell_plan_inhouse_date')->nullable();
            $table->string('shell_actual_inhouse_date')->nullable();
            $table->string('shell_origin_country')->nullable();
            $table->string('shell_app_supplier_name')->nullable();
            $table->string('trims_booking_date')->nullable();
            $table->string('trims_plan_inhouse_date')->nullable();
            $table->string('trims_actual_inhouse_date')->nullable();
            $table->string('trims_origin_country')->nullable();
            $table->string('trims_app_supplier_name')->nullable();
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
        Schema::dropIfExists('fabrics_tna');
    }
}
