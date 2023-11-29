<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenan extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_tenan';
    protected $fillable = ['nama_tenan', 'no_telp'];

    public $incrementing = false; // Disable auto-incrementing for the primary key
    protected $keyType = 'string'; // Specify the key type as string
}

