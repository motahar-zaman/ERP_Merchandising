<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllAccTnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_acc_tna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('order_summary_style')->nullable();
            $table->string('item_name')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('inhouse_date')->nullable();
            $table->string('actual_inhouse_date')->nullable();
            $table->string('org_country')->nullable();
            $table->string('supplier_name')->nullable();
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
        Schema::dropIfExists('all_acc_tna');
    }
}
