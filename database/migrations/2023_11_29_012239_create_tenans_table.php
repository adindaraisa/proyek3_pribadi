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
        Schema::create('tenans', function (Blueprint $table) {
            $table->id(); // This is a standard auto-incrementing primary key
            $table->string('kode_tenan')->unique(); // Unique constraint to ensure uniqueness
            $table->string('nama_tenan');
            $table->string('no_telp', 15);
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
        Schema::dropIfExists('tenans');
    }
};
