<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EkspertizParca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcaekspertiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ekspertizid');
            $table->unsignedBigInteger('yedekparcaid');
            $table->double('satisfiyati')->nullable();
            $table->double('toplamfiyat')->nullable();
            $table->integer('adet')->nullable();
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
        Schema::dropIfExists('parcaekspertiz');
    }
}
