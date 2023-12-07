<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "Order";
    protected $fillable = [
        'uid',
        'name',
        'phone',
        'address',
        'produk',
        'Qty',
        'total'
    ];

    public function barang(){
        return $this->belongsToMany(Barang::class)
        ->withPivot(['Qty','Harga']);
    }
}
