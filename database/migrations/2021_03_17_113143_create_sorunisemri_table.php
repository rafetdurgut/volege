<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorunisemriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('sorunisemri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('isemriid'); // ilişkisel isemrine ait sorunu tutacak
            $table->longText('sorunmetni')->nullable(); //isemrine ait sorunlar 
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorunisemri');
    }
}
