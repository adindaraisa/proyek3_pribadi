<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->truncate();
        DB::table('barangs')->insert([
            [
                'kode_barang' => 'BRG03501',
                'nama_barang'   => 'Permen',
                'satuan' => 'Pcs',
                'harga_satuan' => 2000,
                'stok' => 30
            ],
            [
                'kode_barang' => 'BRG03502',
                'nama_barang'   => 'Nasi Kuning',
                'satuan' => 'Bungkus',
                'harga_satuan' => 7000,
                'stok' => 30
            ],
        ]);
    }
}
