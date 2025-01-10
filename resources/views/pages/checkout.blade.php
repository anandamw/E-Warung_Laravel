@extends('layouts.template')

@section('content')
    <div class="mb4d25">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="membership_chk_bg">
                        <div class="fcrse_1">
                            <a href="course_detail_view.html" class="hf_img">
                                {{-- <img class="cart_img" src="{{ asset('') }}assets/images/courses/img-2.jpg" alt=""> --}}

                                <img src="{{ asset('thumbnail_produk/' . $produkDetail->thumbnail) }}" alt="">
                            </a>
                            <div class="hs_content">
                                <div class="eps_dots eps_dots10 more_dropdown">
                                    <a href="#"><i class='uil uil-times'></i></a>
                                </div>
                                <a href="course_detail_view.html"
                                    class="crse14s title900 pt-2">{{ $produkDetail->nama_produk }}</a>
                                <a href="#" class="crse-cate"> {{ $produkDetail->nama_kategori }},
                                    {{ $produkDetail->nama_sub_kategori }}</a>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">By <a href="#">John Doe</a></p>
                                    <div class="prce142">
                                        @if ($produkDetail->atr->min('harga') == $produkDetail->atr->max('harga'))
                                            Rp {{ number_format($produkDetail->atr->max('harga')) }} x {{ $kuantitas }}
                                        @else
                                            Rp {{ number_format($produkDetail->atr->min('harga')) }} - Rp
                                            {{ number_format($produkDetail->atr->max('harga')) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="membership_chk_bg">

                        <div class="checkout_title">
                            <h4>Billing Details</h4>
                            <img src="{{ asset('') }}assets/images/line.svg" alt="">
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="address1">
                                    <div class="panel-title">
                                        <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                            href="#collapseaddress1" aria-expanded="false" aria-controls="collapseaddress1">
                                            Edit Address
                                        </a>
                                    </div>
                                </div>
                                <div id="collapseaddress1" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="address1">
                                    <div class="panel-body basic_form">
                                        <form action="/alamat-ck/{{ $getAlamat->id_alamats }}/" method="POST">
                                            <div class="row">
                                                @csrf

                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Nama*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="nama"
                                                                id="id_city" value="{{ $getAlamat->nama }}" required
                                                                placeholder="City">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Alamat*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="alamat"
                                                                id="id_state" value="{{ $getAlamat->alamat }}" required
                                                                placeholder="State / Province / Region">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Provinsi*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="provinsi" value="{{ $getAlamat->provinsi }}"
                                                                id="id_city" required="" placeholder="City">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Kabupaten*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="kabupaten" value="{{ $getAlamat->kabupaten }}"
                                                                id="id_state" required="" placeholder="Kabupaten">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Kecamatan*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="kecamatan" value="{{ $getAlamat->kecamatan }}"
                                                                id="id_zip" required="" placeholder="Kecamatan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Kelurahan*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="desa_kelurahan"
                                                                value="{{ $getAlamat->desa_kelurahan }}" id="id_phone"
                                                                required="" placeholder="Kelurahan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Dusun*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="dusun" id="id_zip"
                                                                value="{{ $getAlamat->dusun }}" required
                                                                placeholder="Dusun">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>RT/RW*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="rtrw" value="{{ $getAlamat->rtrw }}"
                                                                id="id_phone" required="" placeholder="RT/RW">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Kode POS*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text"
                                                                name="kode_pos" value="{{ $getAlamat->kode_pos }}"
                                                                id="id_zip" placeholder="Kode POS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30 lbel25">
                                                        <label>Detail*</label>
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore"
                                                                value="{{ $getAlamat->detail }}" type="text"
                                                                name="detail" id="id_phone" required=""
                                                                placeholder="Detail">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="id_transaksi"
                                                    value="{{ $transaction->id }}">

                                                <div class="col-lg-6">
                                                    <button class="save_address_btn" type="submit">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="address_text">
                            Nama : {{ $getAlamat->nama }} <br>
                            Alamat : {{ $getAlamat->alamat }} <br>
                            RT/RW : {{ $getAlamat->rtrw }}<br>
                            Provinsi : {{ $getAlamat->provinsi }} <br>
                            Kabupaten : {{ $getAlamat->kabupaten }} <br>
                            Kecamatan : {{ $getAlamat->kecamatan }} <br>
                            Kelurahan : {{ $getAlamat->desa_kelurahan }} <br>
                            Dusun : {{ $getAlamat->dusun }} <br>
                            Kode Pos : {{ $getAlamat->kode_pos }}<br>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="json" id="json_callback">
                <div class="col-lg-4">
                    <div class="membership_chk_bg rght1528">
                        <div class="checkout_title">
                            <h4>Ringkasan Pesanan</h4>
                            <img src="{{ asset('') }}assets/images/line.svg" alt="">
                        </div>
                        <div class="order_dt_section">
                            <div class="order_title">
                                <h4>{{ $produkDetail->nama_produk }}</h4>
                                <div class="order_price">
                                    @if ($produkDetail->atr->min('harga') == $produkDetail->atr->max('harga'))
                                        Rp {{ number_format($produkDetail->atr->max('harga') * $kuantitas) }}
                                    @else
                                        Rp {{ number_format($produkDetail->atr->min('harga')) }} - Rp
                                        {{ number_format($produkDetail->atr->max('harga') * $kuantitas) }}
                                    @endif
                                </div>
                            </div>
                            <div class="order_title">
                                <h6>Ongkir</h6>
                                <div class="order_price">Rp5.000</div>
                            </div>
                            <div class="order_title">
                                <h2>Total</h2>
                                <div class="order_price5">Rp {{ $produkDetail->harga * $kuantitas + 5000 }}</div>
                            </div>

                            <form action="/sedekah/{{ $transaction->id }}" method="POST">
                                @csrf

                                @if ($transaction->sedekah == null)
                                    <div class="coupon_code">
                                        <p>"Sisihkan sedikit dari pembelian Anda untuk berbagi kebaikan melalui sedekah.
                                            "</p>
                                        <div class="coupon_input">
                                            <div class="ui search focus mt-15">
                                                <div class="ui left icon input swdh11 swdh19">
                                                    <input class="prompt srch_explore" type="text" name="sedekah"
                                                        id="id_coupon_code" placeholder="Minimum Rp 500.">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if ($transaction->sedekah == null)
                                    <button type="submit" class="btn scr_text">Sisihkan</button>
                                @endif

                                @if ($transaction->sedekah == null)
                                    <button type="button" hidden id="pay-button" class="btn scr_text">Bayar
                                        Sekarang</button>
                                @elseif ($transaction->sedekah == true)
                                    <button type="button" id="pay-button" class="btn scr_text">Bayar
                                        Sekarang</button>
                                @endif

                            </form>



                            <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $transaction->snap_token }}', {
                onSuccess: function(result) {

                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    window.location.href = '/payment-success/{{ $transaction->users_id }}';

                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
