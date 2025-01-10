<?php

namespace Database\Seeders;

use App\Models\Alamat;
use App\Models\AtributProduk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\SubKategori;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "username" => "Admin",
                "email" => "admin@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("123"),
                "no_telepon" => "087740505052",
                "name" => null,
                "role" => "admin",
                "token_users" => Str::random(100),
                "alamat_users" => null,
                'foto_profile' => null,
                'deskripsi' => null
            ],
            [
                "username" => "Customer",
                "email" => "customer@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("123"),
                "no_telepon" => "087740505052",
                "name" => null,
                "role" => "customer",
                "token_users" => Str::random(100),
                "alamat_users" => null,
                'foto_profile' => null,
                'deskripsi' => null

            ],
            [
                "username" => "Mitra",
                "email" => "mitra@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("123"),
                "no_telepon" => "087740505052",
                "name" => null,
                "role" => "mitra",
                "token_users" => Str::random(100),
                "alamat_users" => null,
                'foto_profile' => null,
                'deskripsi' => null
            ],
            [
                "username" => "Super_Kurir",
                "email" => "superkurir@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("123"),
                "no_telepon" => "087740505052",
                "name" => null,
                "role" => "superkurir",
                "token_users" => Str::random(100),
                "alamat_users" => null,
                'foto_profile' => null,
                'deskripsi' => null,
                'last_seen' => now()
            ],
            [
                "username" => "Kurir",
                "email" => "kurir@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("123"),
                "no_telepon" => "087740505052",
                "name" => null,
                "role" => "kurir",
                "token_users" => Str::random(100),
                "alamat_users" => null,
                'foto_profile' => null,
                'deskripsi' => null

            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }

        $kategori = [
            [
                "nama_kategori" => "Makanan",
            ],
            [
                "nama_kategori" => "Minuman",
            ],
            [
                "nama_kategori" => "Pakaian",
            ],
        ];

        foreach ($kategori as $item) {
            Kategori::create($item);
        }

        $subs = [
            [
                'kategori_id' => 1,
                'nama_sub_kategori' => 'Cemilan'
            ],
            [
                'kategori_id' => 1,
                'nama_sub_kategori' => 'Tradisional'
            ],
            [
                'kategori_id' => 2,
                'nama_sub_kategori' => 'Jamu'
            ],
            [
                'kategori_id' => 2,
                'nama_sub_kategori' => 'Berenergi'
            ],
            [
                'kategori_id' => 3,
                'nama_sub_kategori' => 'Kaos'
            ],
            [
                'kategori_id' => 3,
                'nama_sub_kategori' => 'Celana'
            ],
        ];

        foreach ($subs as $item) {
            SubKategori::create($item);
        }

        $produk = [
            [
                'token_produk' => uniqid(13),
                'nama_produk' => 'Copeman',
                'deskripsi' => '<p>lorem</p>',
                'sub_kategori_id' => 1,
                'users_id' => 1,
            ],
            [
                'token_produk' => uniqid(13),
                'nama_produk' => 'Keripik',
                'deskripsi' => '<p>lorem</p>',
                'sub_kategori_id' => 1,
                'users_id' => 3,
            ]
        ];

        foreach ($produk as $item) {
            Produk::create($item);
        }

        AtributProduk::create([
            'nama_varian' => 'Original',
            'ukuran' => '100gr',
            'harga' => 10000.00,
            'stok' => 100,
            'produks_id' => 1
        ]);
        AtributProduk::create([
            'nama_varian' => 'Original',
            'ukuran' => '100gr',
            'harga' => 10000.00,
            'stok' => 100,
            'produks_id' => 2
        ]);





        Alamat::create([
            'nama' => "Nama",
            'alamat' => "Alamat",
            'provinsi' => "Provinsi",
            'kabupaten' => "Kabupaten",
            'kecamatan' => "Kecamatan",
            'desa_kelurahan' => "Kelurahan",
            'dusun' => "Dusun",
            'rtrw' => "RT/RW",
            'kode_pos' => "Kode POS",
            'users_id' => 1,
            'detail' => "Detail Informasi"
        ]);

        Alamat::create([
            'nama' => "Nama",
            'alamat' => "Alamat",
            'provinsi' => "Provinsi",
            'kabupaten' => "Kabupaten",
            'kecamatan' => "Kecamatan",
            'desa_kelurahan' => "Kelurahan",
            'dusun' => "Dusun",
            'rtrw' => "RT/RW",
            'kode_pos' => "Kode POS",
            'users_id' => 2,
            'detail' => "Detail Informasi"
        ]);
    }
}
