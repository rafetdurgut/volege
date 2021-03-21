<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musteriler', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tc')->nullable();
            $table->string('adsoyad');
            $table->string('telefon')->nullable();
            $table->string('email')->nullable();
            $table->string('adres')->nullable();
            $table->string('adres2')->nullable();
            $table->string('vergino')->nullable();
            $table->string('vergidairesi')->nullable();
            $table->string('ticaridurum')->nullable();
            $table->string('durum')->nullable();
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
        Schema::dropIfExists('musteriler');
    }
}
