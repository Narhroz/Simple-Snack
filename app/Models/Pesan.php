<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = "Pesan";
    protected $fillable = [
        'nama_awal',
        'nama_akhir',
        'email',
        'no_telp',
        'pesan'
    ];
}
