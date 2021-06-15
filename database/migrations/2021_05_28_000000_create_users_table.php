<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('rtrw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable();
            $table->integer('kecamatan_id')->unsigned()->nullable();
            $table->integer('kabupaten_id')->unsigned()->nullable();
            $table->string('perdes')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('kontak')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('logo')->nullable();
            $table->timestamps();

            $table->foreign('kabupaten_id')->references('id')->on('kabupaten')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
