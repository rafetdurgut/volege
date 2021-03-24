<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturadetay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faturaid')->nullable();
            $table->unsignedBigInteger('yedekparcaid')->nullable();
            $table->integer('miktar');
            $table->double('fiyat');
            $table->string('iskonto')->nullable(); 
            $table->boolean('stoktandusme')->nullable();
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
        Schema::dropIfExists('faturadetay');
    }
}
