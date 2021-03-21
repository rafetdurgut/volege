<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcaisemri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcaisemri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('emirid');
            $table->unsignedBigInteger('yedekparcaid');
            $table->double('satisfiyati')->nullable();
            $table->double('toplamfiyat')->nullable();
            $table->string('iskonto')->nullable();
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
        Schema::dropIfExists('parcaisemri');
    }
}
