<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturalar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('faturakodu');
            $table->string('carikodu');
            $table->dateTime('faturatarih')->nullable();
            //$table->string('cariadi')->nullable(); // burası zaten cari kodda var. Tüm müsterileri kaydetcez.
            $table->dateTime('vade')->comment('Vade tarihi')->nullable();
            $table->enum('faturatipi', ['Alış', 'Satış']);
            $table->enum('faturadurum', ['Açık', 'Kapalı']);
            $table->string('gibno')->comment('Gelir idaresi kodu')->nullable();
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
        Schema::dropIfExists('faturalar');
    }
}
