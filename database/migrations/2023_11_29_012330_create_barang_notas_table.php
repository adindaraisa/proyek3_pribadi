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
        Schema::create('barang_notas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_nota')->nullable();
            $table->foreign('kode_nota')->references('kode_nota')->on('notas')->onDelete("cascade");
            $table->string('kode_barang')->nullable();
            $table->foreign('kode_barang')->references('kode_barang')->on('barangs')->onDelete("cascade");
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
        Schema::dropIfExists('barang_notas');
    }
};
