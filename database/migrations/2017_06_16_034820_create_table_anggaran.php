<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun');
            $table->bigInteger('nominal');
            $table->integer('pic');
            // $table->bigInteger('ri');
            // $table->bigInteger('op');
            // $table->bigInteger('used_ri');
            // $table->bigInteger('used_op');
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
        Schema::dropIfExists('anggaran');
    }
}
