<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderKurir extends Model
{
    use HasFactory;
    protected $table = "order_kurir";
    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function kurir()
    {
        return $this->belongsTo(Kurir::class, 'kurir_id', 'id_kurirs');
    }
}
