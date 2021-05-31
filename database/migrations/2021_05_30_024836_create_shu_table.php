<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bumdes_id')->unsigned();
            $table->integer('nilai');
            $table->string('tanggal');
            $table->timestamps();

            $table->foreign('bumdes_id')->references('id')->on('profil_bumdes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shu');
    }
}
