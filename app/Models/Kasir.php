<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_kasir';
    protected $fillable = ['nama_kasir', 'no_telp'];

    public $incrementing = false; // Disable auto-incrementing for the primary key
    protected $keyType = 'string'; // Specify the key type as string
}
