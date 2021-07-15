<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineLoadingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_loading_plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('factory_id')->nullable();
            $table->int('buyer_id')->nullable();
            $table->int('style_id')->nullable();
            $table->int('item_id')->nullable();
            $table->string('floor')->nullable();
            $table->string('line_no')->nullable();
            $table->int('quantity')->nullable();
            $table->int('with_percent')->nullable();
            $table->int('allot_qty')->nullable();
            $table->string('mc_use')->nullable();
            $table->int('manpower')->nullable();
            $table->int('smv')->nullable();
            $table->int('avg_prod')->nullable();
            $table->int('days_total')->nullable();
            $table->int('eff_avg')->nullable();
            $table->int('avl_min_1')->nullable();
            $table->int('avl_min_2')->nullable();
            $table->string('date')->nullable();
            $table->text('date_with_efficiency')->nullable();
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
        Schema::dropIfExists('line_loading_plan');
    }
}
