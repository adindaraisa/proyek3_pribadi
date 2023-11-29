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
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('kode_nota');
            $table->foreignId('kode_tenan')->nullable();
            $table->foreign('kode_tenan')->references('kode_tenan')->on('tenans')->onDelete("cascade");
            $table->foreignId('kode_kasir')->nullable();
            $table->foreign('kode_kasir')->references('kode_kasir')->on('kasirs')->onDelete("cascade");
            $table->date('tgl_nota');
            $table->time('jam_nota');
            $table->float('jumlah_belanja');
            $table->float('diskon');
            $table->float('total');
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
        Schema::dropIfExists('notas');
    }
};
