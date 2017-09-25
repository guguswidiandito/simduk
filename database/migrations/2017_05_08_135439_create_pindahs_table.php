<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pindah');
            $table->integer('penduduk_id')->unsigned();
            $table->date('tgl_pindah');
            $table->string('alamat_tuju');
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
        Schema::dropIfExists('pindahs');
    }
}
