<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFolder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_folder', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('pic');
            $table->string('kategori');
            $table->integer('id_proyek')->nullable();
            $table->integer('id_sub_tahapan');
            $table->integer('tahun');
            $table->string('path');
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
        Schema::dropIfExists('tabel_folder');
    }
}
