<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {

        // $getAll =  Keranjang::join('produks', 'keranjangs.produks_id', '=', 'produks.id_produks')
        // ->join('atribut_produk', 'produks.id_produks', '=', 'atribut_produk.produks_id')

        // ->where('keranjangs.users_id',  auth()->user()->id)
        //     ->get();

        $getAll = Produk::join('sub_kategoris', 'produks.sub_kategori_id', '=', 'sub_kategoris.id_sub_kategori')->join('users', 'produks.users_id', '=', 'users.id')
            ->join('kategoris', 'sub_kategoris.kategori_id', '=', 'kategoris.id_kategoris')->join('atribut_produk', 'produks.id_produks', '=', 'atribut_produk.produks_id')
            ->join('keranjangs', 'produks.id_produks', '=', 'keranjangs.produks_id')->get();

        return view('pages.keranjang', compact('getAll'));
    }



    public function create()
    {



        return view('pages.keranjang');
    }

    public function update($id)
    {
        return view();
    }
    public function update_action(Request $request, $id)
    {
        return redirect();
    }
    public function delete($id)
    {
        Keranjang::where('id_keranjang', $id)->delete();
        return redirect('/keranjang');
    }
}
