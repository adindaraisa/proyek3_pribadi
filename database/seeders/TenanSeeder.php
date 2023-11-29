<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenans')->truncate();
        DB::table('tenans')->insert([
            [
                'kode_tenan' => 'TK03501',
                'nama_tenan'   => 'Adinda maret',
                'no_telp' => '08221511035375'
            ],
            [
                'kode_tenan' => 'TK03502',
                'nama_tenan'   => 'Adinda mart',
                'no_telp' => '08221511035735'
            ],
        ]);
    }
}
