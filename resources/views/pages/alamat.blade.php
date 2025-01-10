@extends('layouts.template')

@section('content')
    <div class="mb4d25">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

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
                                        <form action="/alamat/{{ $getAlamat->id_alamats }}/" method="POST">
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
                                                            <input class="prompt srch_explore" type="text" name="dusun"
                                                                id="id_zip" value="{{ $getAlamat->dusun }}" required
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
                                                                id="id_zip" required="" placeholder="Kode POS">
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


            </div>
        </div>
    </div>
@endsection
