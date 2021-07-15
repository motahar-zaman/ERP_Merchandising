<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no')->nullable();
            $table->string('style_no')->nullable();
            $table->string('order_date')->nullable();
            $table->string('shipment_date')->nullable();
            $table->string('size_range')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('order_qty')->nullable();
            $table->string('order_value')->nullable();
            $table->string('price_curr')->nullable();
            $table->string('remarks')->nullable();
            $table->string('buyer')->nullable();
            $table->string('merchandiser')->nullable();
            $table->string('item_desc')->nullable();
            $table->string('shell_fabric')->nullable();
            $table->string('master_lc_no')->nullable();
            $table->string('master_lc_date')->nullable();
            $table->string('wash_type')->nullable();
            $table->string('embroidery')->nullable();
            $table->string('printing')->nullable();
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
        Schema::dropIfExists('store_orders');
    }
}
