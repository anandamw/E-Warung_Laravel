<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AlamatController extends Controller
{


    public function edit($id)
    {

        $getAlamat = Alamat::where('id_alamats', $id)->first();

        return view('pages.alamat', compact('getAlamat'));
    }



    public function edit_aksi($id, Request $request)
    {

        // dd($request->all());

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa_kelurahan' => $request->desa_kelurahan,
            'dusun' => $request->dusun,
            'rtrw' => $request->rtrw,
            'kode_pos' => $request->kode_pos,
            'users_id' => auth()->user()->id,
            'detail' => $request->detail,
        ];


        Alamat::where('id_alamats', $id)->update($data);


        return redirect()->route('alamat', $id);
    }

    public function edit_aksi_checkout($id, Request $request, Transaction $transaction)
    {

        $transaksiId = $request->id_transaksi;

        // dd($transaksiId);

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa_kelurahan' => $request->desa_kelurahan,
            'dusun' => $request->dusun,
            'rtrw' => $request->rtrw,
            'kode_pos' => $request->kode_pos,
            'users_id' => auth()->user()->id,
            'detail' => $request->detail,
        ];



        Alamat::where('id_alamats', $id)->update($data);

        // $transaction = Transaction::

        return redirect()->route('checkout', $transaksiId);
    }
}
