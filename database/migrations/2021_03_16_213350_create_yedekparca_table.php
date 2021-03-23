<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYedekparcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yedekparca', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ureticikodu')->nullable();
            $table->string('stokadi');
            $table->string('stokkodu');            
            $table->string('barkod')->nullable();
            $table->string('urungrup')->nullable();
            $table->enum('birim',['Yok','Adet','Litre','Takım','Paket']);
            $table->double('alisfiyati')->nullable();
            $table->double('satisfiyati')->nullable();
            $table->integer('stokadet')->nullable();
            $table->integer('uyarimiktari')->nullable();   
            $table->integer('kdv')->nullable();         
            $table->string('parabirim')->default('TL')->nullable(); // Birim fiyat belki enum yapılabilir.
            //$table->string('iskonto')->nullable(); // Birim fiyat belki enum yapılabilir.
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
        Schema::dropIfExists('yedekparca');
    }
}
