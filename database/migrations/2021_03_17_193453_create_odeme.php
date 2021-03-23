<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdeme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odeme', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faturano')->nullable(); 
            $table->double('odenenmiktar');
            $table->string('odemekanali')->nullable();  
            $table->string('odemetipi')->nullable(); 
            $table->string('carikodu')->nullable(); 
            $table->string('aciklama')->nullable(); 
            $table->dateTime('odemetarihi')->nullable();
            $table->timestamps(); //insert ve update'i gormek icin kalsin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odeme');
    }
}
