<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAraclarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('araclar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('saseno')->nullable();
            $table->string('motorno')->nullable();
            $table->string('plaka');
            $table->string('marka')->nullable();
            $table->string('model')->nullable();
            $table->unsignedSmallInteger('yil')->nullable();
            $table->unsignedBigInteger('musteriid')->nullable(); //ilişki kurmak için
            
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
        Schema::dropIfExists('araclar');
    }
}
