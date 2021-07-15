<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreProductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_production', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('order_summary_style')->nullable();
            $table->string('color_name')->nullable();
            $table->string('size_ready_date')->nullable();
            $table->string('pp_meeting_date')->nullable();
            $table->string('bulk_cut_date')->nullable();
            $table->string('sewing_start')->nullable();
            $table->string('sewing_finish')->nullable();
            $table->string('washing_date')->nullable();
            $table->string('finishing_packing')->nullable();
            $table->string('final_inspection')->nullable();
            $table->string('ex_factory')->nullable();
            $table->string('actual_size_ready_date')->nullable();
            $table->string('actual_pp_meeting_date')->nullable();
            $table->string('actual_bulk_cut_date')->nullable();
            $table->string('actual_sewing_start')->nullable();
            $table->string('actual_sewing_finish')->nullable();
            $table->string('actual_washing_date')->nullable();
            $table->string('actual_finishing_packing')->nullable();
            $table->string('actual_final_inspection')->nullable();
            $table->string('actual_ex_factory')->nullable();
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
        Schema::dropIfExists('pre_production');
    }
}
