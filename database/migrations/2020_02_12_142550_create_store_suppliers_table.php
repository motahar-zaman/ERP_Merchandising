<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_phone')->nullable();
            $table->string('supplier_mobile')->nullable();
            $table->string('supplier_fax')->nullable();
            $table->string('supplier_email')->nullable();
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
        Schema::dropIfExists('store_suppliers');
    }
}
