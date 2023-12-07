<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    
    public function keranjang()
    {
        return $this->hasMany(Cart::class, 'id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'Id');
    }
}
