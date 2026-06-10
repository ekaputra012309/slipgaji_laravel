<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenanggungjawabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penanggungjawab', function (Blueprint $table) {
            $table->id();
            $table->string('ikahi_cab')->nullable();
            $table->string('lain2')->nullable();
            $table->string('arisan_gabungan')->nullable();
            $table->string('simpan_pinjam')->nullable();
            $table->string('iuran_dyk')->nullable();
            $table->string('iuran_koperasi')->nullable();
            $table->string('ptwp')->nullable();
            $table->string('ipaspi')->nullable();
            $table->string('pinjaman_koperasi')->nullable();
            $table->string('bapor')->nullable();
            $table->string('kebersamaan_hakim')->nullable();
            $table->string('mushola')->nullable();
            $table->string('bri_bsm_jabar')->nullable();
            $table->string('sewa_rumah')->nullable();
            $table->string('iuran_hakim')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_penanggungjawab');
    }
}
