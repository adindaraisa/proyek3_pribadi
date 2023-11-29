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
                'nama_kasir'   => 'Resa',
                'no_telp' => '08990918911'
            ],
            [
                'nama_kasir'   => 'Wulan',
                'no_telp' => '08990918911'
            ],
            [
                'nama_kasir'   => 'Alya',
                'no_telp' => '08990918911'
            ],
        ]);
    }
}
