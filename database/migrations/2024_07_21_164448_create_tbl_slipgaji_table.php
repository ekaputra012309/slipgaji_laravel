<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSlipgajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_slipgaji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('gaji_bulan');
            $table->decimal('gaji', 15, 2);
            $table->decimal('ikahi_cab', 15, 2)->nullable();
            $table->decimal('lain2', 15, 2)->nullable();
            $table->decimal('arisan_gabungan', 15, 2)->nullable();
            $table->decimal('simpan_pinjam', 15, 2)->nullable();
            $table->decimal('iuran_dyk', 15, 2)->nullable();
            $table->decimal('iuran_koperasi', 15, 2)->nullable();
            $table->decimal('ptwp', 15, 2)->nullable();
            $table->decimal('ipaspi', 15, 2)->nullable();
            $table->decimal('pinjaman_koperasi', 15, 2)->nullable();
            $table->decimal('bapor', 15, 2)->nullable();
            $table->decimal('kebersamaan_hakim', 15, 2)->nullable();
            $table->decimal('mushola', 15, 2)->nullable();
            $table->decimal('bri_bsm_jabar', 15, 2)->nullable();
            $table->decimal('sewa_rumah', 15, 2)->nullable();
            $table->decimal('iuran_hakim', 15, 2)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_pegawai')->references('id')->on('tbl_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_slipgaji');
    }
}
