<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilBumdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_bumdes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jenis_id')->unsigned();
            $table->string('alamat');
            $table->string('desa');
            $table->integer('kecamatan_id')->unsigned();
            $table->integer('kabupaten_id')->unsigned();
            $table->integer('telepon');
            $table->text('foto1');
            $table->text('foto2');
            $table->text('foto3');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();

            $table->foreign('kabupaten_id')->references('id')->on('kabupaten')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('jenis_usaha')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_bumdes');
    }
}
