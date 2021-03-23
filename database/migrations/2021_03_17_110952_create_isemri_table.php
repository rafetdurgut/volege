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
            $table->unsignedInteger('arackm')->nullable();
            $table->decimal('yakitdurumu')->nullable();
            $table->double('tahminitutar')->nullable();
            $table->string('teknisyen')->nullable();
            $table->string('saseno');
            $table->string('tc');
            $table->string('teslimeden')->nullable();
            $table->string('teslimalan')->nullable();
            $table->string('iscilik')->nullable(); //burada iscilik notu mu saat cinsinden iscilik mi?
            $table->longText('yapilanlar')->nullable();
            $table->longText('talep')->nullable();
            $table->dateTime('araccikistarihi')->nullable();
            $table->boolean('emiraktif')->default(1); //emir aktif veya pasif mi?
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
