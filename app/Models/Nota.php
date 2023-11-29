<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_nota';
    protected $fillable = ['kode_tenan', 'nama_tenan', 'jumlah_belanja', 'diskon', 'total'];

    public $incrementing = false; // Disable auto-incrementing for the primary key
    protected $keyType = 'string'; // Specify the key type as string
}
