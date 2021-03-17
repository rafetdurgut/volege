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
            $table->string('cinsi');
            $table->smallInteger('Miktar');
            $table->decimal('fiyat');
            $table->string('iskonto')->nullable();
            $table->unsignedBigInteger('faturaid')->nullable();
            $table->unsignedBigInteger('yedekparcaid')->nullable();
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
