<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EkspertizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekspertiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('aracgiristarihi'); //belki sadece tarih olabilir?
            $table->unsignedInteger('arackm')->nullable();
            $table->decimal('yakitdurumu')->nullable();
            $table->decimal('tahminitutar')->nullable();
            $table->string('saseno');
            $table->string('tc');
            $table->string('resimurl')->nullable();;
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
        //
        Schema::dropIfExists('ekspertiz');

    }
}
