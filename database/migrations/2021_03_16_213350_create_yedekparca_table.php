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
            $table->string('stokkodu');
            $table->string('stokadi');
            $table->smallInteger('adet');
            $table->decimal('alisfiyati')->nullable();
            $table->string('parabirim')->default('TL')->nullable(); // Birim fiyat belki enum yapılabilir.
            $table->dateTime('alimtarihi')->nullable();
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
