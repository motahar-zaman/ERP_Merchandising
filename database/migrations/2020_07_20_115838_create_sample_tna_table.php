<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampleTnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     
        Schema::create('sample_tna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('order_summary_style')->nullable();
            $table->string('color_name')->nullable();
            $table->string('first_fit_submission')->nullable();
            $table->string('second_fit_submission')->nullable();
            $table->string('third_fit_submission')->nullable();
            $table->string('fit_approved_date')->nullable();
            $table->string('first_wash_sub_date')->nullable();
            $table->string('second_wash_sub_date')->nullable();
            $table->string('third_wash_sub_date')->nullable();
            $table->string('wash_app_comm_rcv_date')->nullable();
            $table->string('size_set_sub_date')->nullable();
            $table->string('size_set_rcv_date')->nullable();
            $table->string('first_pp_sub_date')->nullable();
            $table->string('second_pp_sub_date')->nullable();
            $table->string('third_pp_sub_date')->nullable();
            $table->string('pp_approved_date')->nullable();

            $table->string('actual_first_fit_submission')->nullable();
            $table->string('actual_second_fit_submission')->nullable();
            $table->string('actual_third_fit_submission')->nullable();
            $table->string('actual_fit_approved_date')->nullable();
            $table->string('actual_first_wash_sub_date')->nullable();
            $table->string('actual_second_wash_sub_date')->nullable();
            $table->string('actual_third_wash_sub_date')->nullable();
            $table->string('actual_wash_app_comm_rcv_date')->nullable();
            $table->string('actual_size_set_sub_date')->nullable();
            $table->string('actual_size_set_rcv_date')->nullable();
            $table->string('actual_first_pp_sub_date')->nullable();
            $table->string('actual_second_pp_sub_date')->nullable();
            $table->string('actual_third_pp_sub_date')->nullable();
            $table->string('actual_pp_approved_date')->nullable();

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
        Schema::dropIfExists('sample_tna');
    }
}
