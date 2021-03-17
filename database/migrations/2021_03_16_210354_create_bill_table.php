<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturalar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adsoyad');
            $table->string('adres')->nullable();
            $table->string('vergidairesi')->nullable();
            $table->string('vergino')->nullable();
            $table->string('gibno')->comment('Gelir idaresi kodu');
            $table->timestamp('faturatarih');
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
        Schema::dropIfExists('faturalar');
    }
}
