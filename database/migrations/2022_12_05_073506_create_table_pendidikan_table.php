<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->char('bagian_table', 4);
            $table->string('nama_kegiatan');
            $table->string('status');
            $table->integer('jumlah_kegiatan');
            $table->decimal('beban_tugas', 8, 4);
            $table->integer('rencana_pertemuan');
            $table->decimal('sks_mk_terhitung', 8, 4);
            $table->decimal('sks_bkd', 8, 4);
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
        Schema::dropIfExists('table_pendidikan');
    }
};