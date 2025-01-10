<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $guarded = [];

    public function subs()
    {
        return $this->hasMany(SubKategori::class, 'kategori_id', 'id_kategoris');
    }
}
