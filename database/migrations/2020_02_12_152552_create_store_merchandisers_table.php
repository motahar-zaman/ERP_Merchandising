<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreMerchandisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_merchandisers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('merchandiser_id')->nullable();
            $table->string('merchandiser_name')->nullable();
            $table->string('merchandiser_address')->nullable();
            $table->string('merchandiser_phone')->nullable();
            $table->string('merchandiser_mobile')->nullable();
            $table->string('merchandiser_fax')->nullable();
            $table->string('merchandiser_email')->nullable();
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
        Schema::dropIfExists('store_merchandisers');
    }
}
