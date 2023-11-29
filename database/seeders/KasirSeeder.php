<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kasirs')->truncate();
        DB::table('kasirs')->insert([
            [
                'kode_kasir' => 'KS03501',
                'nama_kasir'   => 'Ani Adinda',
                'no_telp' => '08221511035375'
            ],
            [
                'kode_kasir' => 'KS03502',
                'nama_kasir'   => 'Budi Adinda',
                'no_telp' => '08221511035375'
            ],
        ]);
    }
}
