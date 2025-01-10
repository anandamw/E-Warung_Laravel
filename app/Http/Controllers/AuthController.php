<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use App\Models\Produk;
use App\Mail\EmailVariy;
use App\Models\OrderKurir;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'produks' => Produk::with([
                'atr' => function ($query) {
                    $query->select('produks_id', 'stok', 'harga')
                        ->orderBy('harga', 'asc');
                },
                'subs' => function ($query) {
                    $query->select('id_sub_kategori', 'nama_sub_kategori')->get();
                },
            ], 'user')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
        ];
        return view('pages.beranda', $data);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                "email" => "required",
                "password" => "required",
            ],
            [
                "email.required" => "Email Tidak Diisi",
                "password.required" => "Password Tidak Diisi",
            ]
        );

        $cridentials = $request->only(["email", "password"]);

        if (Auth::attempt($cridentials)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/dashboard');
            } elseif (auth()->user()->role == 'mitra') {
                return redirect('/mitra/dashboard');
            } elseif (auth()->user()->role == 'customer') {
                return redirect('/beranda');
            } else {
                return redirect('/')->with('error', 'Role Tidak Diketahui');
            }
        }
        return redirect('/')->with('error', 'Email/Password Salah');
    }



    public function register()
    {
        return view('auth.register');
    }

    public function register_action(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'no_telepon' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Membuat user baru
        $user = User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "no_telepon" => $request->no_telepon,
            "token_users" => Str::random(100),
            "role" => "customer",
            "name" => null,
            "deskripsi" => null,
            "alamat_users" => null,
            "foto_profile" => null
        ]);

        // Memicu event 'Registered' untuk user baru
        event(new Registered($user));

        // Membuat entri alamat yang terhubung dengan user_id yang baru dibuat
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
            'users_id' => $user->id,  // Mengambil id dari user yang baru saja dibuat
            'detail' => "Detail Informasi"
        ]);

        // Log in user
        Auth::login($user);

        // Redirect ke halaman verifikasi email
        return redirect('/email/verify');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function AuthRole__()
    {

        $authrole =  auth()->user()->role;

        if ($authrole == "admin") {
            toast('Berhasil Melakukan Perubahan', 'info');

            return redirect('/admin/dashboard');
        } elseif ($authrole == "mitra") {
            return redirect('/mitra/dashboard');
        } elseif ($authrole == 'customer') {
            return redirect('/beranda');
        } elseif ($authrole == 'superkurir'){
            return redirect('/superkurir/dashboard');
        }
    }

    public function testing(){
        $data = [
            'orderKurir' => OrderKurir::with('transaksi.produk', 'transaksi.pemesan')->where('kurir_id', 1)->get(),
        ];

        return view('testing.test', $data);
    }
}
