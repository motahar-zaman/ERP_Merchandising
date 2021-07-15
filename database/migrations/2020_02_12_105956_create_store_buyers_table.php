<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreBuyersTable extends Migration
{

    public function up()
    {
        Schema::create('store_buyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buyer_id')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_address')->nullable();
            $table->string('buyer_phone')->nullable();
            $table->string('buyer_mobile')->nullable();
            $table->string('buyer_fax')->nullable();
            $table->string('buyer_email')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('store_buyers');
    }
}
