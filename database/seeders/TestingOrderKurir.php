<?php

namespace Database\Seeders;

use App\Models\Kurir;
use App\Models\OrderKurir;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestingOrderKurir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'users_id' => 2,
            'snap_token' => Str::random(15),
            'produks_id' => 1,
            'quantity' => '1',
            'sedekah' => '500',
            'harga' => '10000',
            'total_price' => '10500',
            'status' => 'success',
            'super_kurir_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Kurir::create([
            'users_id' => 5,
            'super_kurir_id' => 4,
            'status_kurir' => 'aktif',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        OrderKurir::create([
            'kurir_id' => 1,
            'transactions_id' => 1,
            'status_kirim' => 'diantar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
