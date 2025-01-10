<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;



    protected $table = 'keranjangs';
    protected $guarded = ['id_keranjang', 'created_at', 'updated_at'];
}
