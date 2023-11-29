<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'satuan', 'harga_satuan', 'stok'];

    protected $primaryKey = 'kode_barang'; // Assuming your primary key column is 'kode_barang'
    public $incrementing = false; // Disable auto-incrementing for the primary key
    protected $keyType = 'string'; // Specify the key type as string

    // public function getKodeBarangAttribute()
    // {
    //     $nim = '035'; // Replace with your actual NIM
    //     $lastBarang = static::where('kode_barang', 'like', 'BRG' . $nim . '%')->latest('kode_barang')->first();

    //     if (!$lastBarang) {
    //         return 'BRG' . $nim . '01';
    //     }

    //     $lastNumber = intval(substr($lastBarang->kode_barang, -2));
    //     $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);

    //     return 'BRG' . $nim . $nextNumber;
    // }

}
