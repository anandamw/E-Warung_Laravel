<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;
    protected $table = 'kurirs';
    protected $guarded = [];

    public function kurirdata()
    {
        return $this->hasMany(User::class, 'id');
    }
}
