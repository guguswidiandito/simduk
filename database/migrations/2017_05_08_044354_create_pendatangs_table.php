<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendatangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pendatang');
            $table->integer('penduduk_id')->unsigned();
            $table->date('tgl_datang');
            $table->string('alamat_asal');
            $table->string('keterangan');
            $table->foreign('penduduk_id')->references('id')->on('penduduks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pendatangs');
    }
}
