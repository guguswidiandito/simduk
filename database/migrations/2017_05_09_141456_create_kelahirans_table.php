<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_akte');
            $table->string('nama_anak');
            $table->string('nama_orangtua');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('kk_id')->unsigned();
            $table->foreign('kk_id')->references('id')->on('kks')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kelahirans');
    }
}
