<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsemriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isemirleri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('aracgiristarihi'); //belki sadece tarih olabilir?
            $table->dateTime('isemriolusturmatarihi');
            $table->unsignedInteger('arackm')->nullable();
            $table->decimal('yakitdurumu')->nullable();
            $table->decimal('tahminitutar')->nullable();
            $table->string('teknisyen')->nullable();
            $table->string('iscilik')->nullable(); //burada iscilik notu mu saat cinsinden iscilik mi?
            $table->longText('yapilanlar')->nullable();
            $table->dateTime('araccikistarihi')->nullable();
            $table->boolean('emiraktif')->default(true); //emir aktif veya pasif mi?
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
        Schema::dropIfExists('isemirleri');
    }
}
