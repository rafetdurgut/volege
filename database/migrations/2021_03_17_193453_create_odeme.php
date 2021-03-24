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
            $table->string('faturakodu');
            $table->string('carikodu');
            $table->dateTime('odemetarihi')->nullable();
            $table->enum('odemetipi', ['Borç', 'Alacak']);
            $table->double('odenenmiktar');
            $table->longText('aciklama')->nullable();
            $table->enum('odemekanali', ['Havale', 'Kredi Kartı', 'Nakit']);
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
        Schema::dropIfExists('odeme');
    }
}
