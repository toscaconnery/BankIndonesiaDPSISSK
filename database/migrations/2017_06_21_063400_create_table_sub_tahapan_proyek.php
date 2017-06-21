<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubTahapanProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tahapan_proyek', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tahapan');
            $table->string('nama');
            $table->string('pic');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->date('tgl_real_mulai')->nullable();
            $table->date('tgl_real_selesai')->nullable();
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
        Schema::dropIfExists('sub_tahapan_proyek');
    }
}
