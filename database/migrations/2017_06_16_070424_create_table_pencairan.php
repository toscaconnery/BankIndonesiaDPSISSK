<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePencairan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan', function(Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_pencairan');
            $table->integer('nominal');
            $table->string('keterangan');
            $table->string('pic');
            $table->string('kategori');
            $table->string('proyek')->nullable();
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
        Schema::dropIfExists('pencairan');
    }
}
