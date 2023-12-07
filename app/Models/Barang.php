<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = [
        'Nama_barang',
        'Harga',
        'Deskripsi',
        'image',
        'stock'
    ];
    public $timestamps = false;
    // public function barang(){
    //     return $this ->belongsTo(Barang::class, 'Id');
    // }
}
