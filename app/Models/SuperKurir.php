<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperKurir extends Model
{
    use HasFactory;
    protected $table = "order_kurir";
    protected $guarded = ["id_order_kurir", "created_at", "updated_at"];
}
