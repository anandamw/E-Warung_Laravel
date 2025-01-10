<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'quantity',
        'users_id',
        'produks_id',
        'total_price',
        'harga',
        'sedekah',
        'status',
        'snap_token',
        'super_kurir_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produks_id', 'id_produks');
    }

    public function pemesan()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
