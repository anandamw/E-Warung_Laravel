<?php

namespace App\Http\Controllers;


use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function process($token, Request $request)
    {

        $kuantitas = $request->quantity;


        $action = $request->input('action');

        if ($action == 'beli_sekarang') {
            // $kuantitas = $request->input->quantity;
            // dd($kuantitas);

            $pembeli = auth()->user()->id;

            // Ambil data produk berdasarkan token
            $produks = Produk::join('atribut_produk', 'produks.id_produks', '=', 'atribut_produk.produks_id')
                ->where('token_produk', $token)
                ->first();

            $total = $produks->harga * $kuantitas;

            // Buat entri transaksi baru
            $transaction = Transaction::create([
                'quantity' => $kuantitas,
                'users_id' => $pembeli,
                'produks_id' => $produks->id_produks,
                'total_price' => $total,
                'status' => 'pending',
                'harga' => $produks->harga
            ]);

            return redirect()->route('checkout', $transaction->id);
        } elseif ($action == 'tambah_keranjang') {
            $pembeli = auth()->user()->id;
            // Ambil data produk berdasarkan token
            $produks = Produk::join('atribut_produk', 'produks.id_produks', '=', 'atribut_produk.produks_id')
                ->where('token_produk', $token)
                ->first();
            $tokenkeranjang = Str::random(20);

            $keranjang = Keranjang::create([
                'token_keranjang' => $tokenkeranjang,
                'users_id' => $pembeli,
                'produks_id' => $produks->id_produks,
                'kuantitas' => $request->quantity
            ]);
        }


        return redirect('/keranjang');
    }


    public function sedekah(Request $request, $id)
    {
        // Validasi nilai sedekah 
        $request->validate([
            'sedekah' => 'required|numeric|min:500'
        ]);

        $data = Transaction::where('id', $id)->first();

        // dd($total_price);
        // Update nilai sedekah pada transaksi yang sesuai
        Transaction::where('id', $id)->update([
            // update sedekah 
            'sedekah' => $request->sedekah,
        ]);

        // $total_price =  $data->harga + $data->sedekah + $data->harga;

        $transaction = Transaction::find($id);
        // Ambil kembali transaksi setelah diupdate

        // dd($transaction);

        $get_total = $transaction->quantity * $transaction->harga + $transaction->sedekah;
        // dd($get_total);

        Transaction::where('id', $id)->update([
            "total_price" => $get_total,
        ]);


        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Buat orderId unik
        $orderId = uniqid();

        // Persiapkan parameter untuk transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $get_total, // pastikan total_price sudah diperbarui dengan benar
            ],
            'customer_details' => [
                'first_name' => auth()->user()->username,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_telepon,
            ],
        ];

        // Dapatkan Snap Token dari Midtrans
        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->snap_token = $snapToken;
            $transaction->save();
            // dd($transaction);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Gagal mendapatkan Snap Token: ' . $e->getMessage());
        }

        // Redirect ke halaman pembayaran
        return redirect()->route('checkout', $transaction->id);
    }



    public function checkout(Request $request, Transaction $transaction)
    {
        $kuantitas = $transaction->quantity;

        $produkDetail = Produk::join('sub_kategoris', 'produks.sub_kategori_id', '=', 'sub_kategoris.id_sub_kategori')
            ->join('users', 'produks.users_id', '=', 'users.id')
            ->join('kategoris', 'sub_kategoris.kategori_id', '=', 'kategoris.id_kategoris')
            ->join('atribut_produk', 'produks.id_produks', '=', 'atribut_produk.produks_id')
            ->where('produks.id_produks', $transaction->produks_id)
            ->first();


        $userID = auth()->user()->id;
        $getAlamat = Alamat::where('users_id', $userID)->first();

        // Jika produk detail tidak ditemukan, tangani kasus ini
        if (!$produkDetail) {
            // Redirect atau tampilkan pesan error jika produk tidak ditemukan
            return redirect()->route('home')->withErrors('Produk tidak ditemukan.');
        }


        return view('pages.checkout', compact('transaction', 'produkDetail', 'kuantitas', 'getAlamat'));
    }




    public function updateStatus(Request $request)
    {

        // dd($request->all());

        // Ambil order_id dan status dari permintaan
        $order_id = $request->input('order_id');
        $status = $request->input('status');
        $payment_data = $request->input('payment_data');

        // Cari transaksi berdasarkan order_id dari Midtrans
        $transaction = Transaction::where('snap_token', $order_id)->first();

        // dd($transaction);

        if ($transaction) {
            // Update status transaksi
            $transaction->status = $status;
            $transaction->payment_data = json_encode($payment_data); // Simpan data pembayaran
            $transaction->save();

            // Berik80630771198an respon sukses ke frontend
            return response()->json(['success' => true]);
        }

        // Jika transaksi tidak ditemukan, beri respon error
        return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan']);
    }


    public function callback(Request $request, $id)
    {

        $data = [
            'status' => 'success',
        ];
        // Temukan transaksi berdasarkan order_id
        Transaction::where('users_id', $id)->update($data);


        $roleUser = auth()->user()->role;

        if ($roleUser == "customer") {
            return redirect('/');
        } elseif ($roleUser == "mitra") {
            return redirect('/mitra/dashboard/');
        }
    }
}
