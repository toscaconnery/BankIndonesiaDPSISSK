<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelengkapanProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('kelengkapan_proyek', function(Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('id_proyek');
        //     $table->string('spesifikasi_kebutuhan')->nullable();
        //     $table->string('use_case_effort_estimation')->nullable();
        //     $table->string('solusi_si')->nullable();
        //     $table->string('proposal')->nullable();
        //     $table->string('jadwal')->nullable();
        //     $table->string('fnds')->nullable();
        //     $table->string('disain_rinci')->nullable();
        //     $table->string('traceability_matrix')->nullable();
        //     $table->string('dokumentasi_program')->nullable();
        //     $table->string('paket_unit_test')->nullable();
        //     $table->string('laporan_unit_test')->nullable();
        //     $table->string('rencana_sit')->nullable();
        //     $table->string('paket_sit')->nullable();
        //     $table->string('laporan_sit')->nullable();
        //     $table->string('paket_test_uat')->nullable();
        //     $table->string('rencana_uat')->nullable();
        //     $table->string('ba_uat')->nullable();
        //     $table->string('laporan_uat')->nullable();
        //     $table->string('juknis_instalasi')->nullable();
        //     $table->string('juknis_operasional')->nullable();
        //     $table->string('rencana_deployment')->nullable();
        //     $table->string('ba_migrasi_data')->nullable();
        //     $table->string('ba_serah_terima_operasional')->nullable();
        //     $table->string('ba_serah_terima_psi')->nullable();
        //     $table->string('rencana_implementasi')->nullable();
        //     $table->string('juknis_aplikasi')->nullable();
        //     $table->string('ba_implementasi')->nullable();
        //     $table->timestamps();

        // });
        Schema::create('kelengkapan_proyek', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyek');
            $table->string('parameter');
            $table->string('tahapan');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('kelengkapan_proyek');
    }
}
