<?php

namespace App\Http\Controllers;

use App\Mail\MendaftarkanKurir;
use App\Models\Kurir;
use App\Models\OrderKurir;
use App\Models\User;
use App\Models\SuperKurir;
use App\Models\Transaction;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class SuperKurirController extends Controller
{
    public function index()
    {

        $GETallDataKurir = [
            "datakurir" =>  Kurir::join('users', 'users.id', '=', 'kurirs.users_id')
                ->where('super_kurir_id', auth()->user()->id)
                ->get(),

        ];

        return view("admin.super_kurir.super_kurir", $GETallDataKurir);
    }

    public function create()
    {
        return view("admin.super_kurir.kurir_create");
    }

    public function store(Request $request)
    {
        $idSuperKurir = auth()->user();
        $email = $request->email;
        $noTelpon = $request->nomer_telepon;
        $token = Str::random(5);
        $password = $token . 'kurir' . substr($noTelpon, -4);
        $file = $request->file('thumbnail');
        if (isset($file)) {
            $file_name = $token . '.' . $file->getClientOriginalExtension();
            $file->move('foto_profile', $file_name);
        } else {
            $file_name = 'default.png';
        }

        $dataUser = [
            'username' => $request->nama_kurir,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => bcrypt($password),
            'token_users' => Str::random(100),
            'no_telepon' => $noTelpon,
            'foto_profile' => $file_name,
            'role' => 'kurir',
        ];

        $idKurir = User::insertGetId($dataUser);
        Mail::to($email)->send(new MendaftarkanKurir($password));

        Kurir::create([
            'users_id' => $idKurir,
            'super_kurir_id' => $idSuperKurir->id,
            'status_kurir' => 'aktif',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect("/$idSuperKurir->role/dashboard")->with([
            'success' => 'Berhasil Mendaftarkan kurir'
        ]);
    }

    public function tugas()
    {
        $idSuperKurir = auth()->user()->id;
        $data = [
            'dataOrder' => OrderKurir::with('transaksi.produk.user', 'transaksi.pemesan', 'kurir.kurirdata')
                ->whereHas('kurir', function ($query) use ($idSuperKurir) {
                    $query->where('super_kurir_id', $idSuperKurir);
                })
                ->get(),
        ];


        return view('admin.super_kurir.tugas', $data);
    }



    public function orderkurir()
    {

        // $users = Transaction::join("users", "transactions.users_id", "=", "users.id")->where("users.role", "superkurir")
        // ->whereNotNull('last_seen')
        // ->orderBy('last_seen', 'DESC')
        // ->paginate(10);
        $users = User::where("role", "superkurir")->get();
        return view('admin.super_kurir.order_kurir', compact('users'));
    }

    public function tugasKan()
    {

        $id  = $_GET['id'];

        $data = [
            "super_kurir_id" => $id
        ];
        $token = $_GET["token"];

        $getIdTRansaction = Transaction::where("snap_token", $token)->first();


        $dataOrder = [
            "kurir_id" => 1,
            "transactions_id" => $getIdTRansaction->id,
            "status_kirim" => "packing"
        ];

        // dd($dataOrder);

        orderkurir::create($dataOrder);
        Transaction::where("snap_token", $token)->update($data);

        // Alert()->success("Yess", "");
        return response()->json("success");
    }

    public function list_kurir()
    {
        


        return view('admin.kurir.kurir');
    }
}
