@extends('layouts.template')
@section('content')
    <div class="mb4d25">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    @foreach ($getAll as $item)
                        <div>{{ $loop->iteration }} </div>

                        <div class="fcrse_1">
                            <a href="course_detail_view.html" class="hf_img">
                                <img src="{{ asset('thumbnail_produk/' . $item->thumbnail) }}" alt="">

                            </a>
                            <div class="hs_content">
                                <div class="eps_dots eps_dots10 more_dropdown">
                                    <a href="/keranjang/{{ $item->id_keranjang }}/delete"><i class="uil uil-times"> </i></a>
                                </div>
                                <a href="course_detail_view.html" class="crse14s title900 pt-2">{{ $item->nama_produk }}</a>
                                <a href="#" class="crse-cate">{{ $item->nama_kategori }},
                                    {{ $item->nama_sub_kategori }}</a>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">By <a href="#">Ananda Maulana Wahyudi</a></p>
                                    <div class="prce142">
                                        @if ($item->atr->min('harga') == $item->atr->max('harga'))
                                            Rp {{ number_format($item->atr->max('harga')) }} x {{ $item->kuantitas }}
                                        @else
                                            Rp {{ number_format($item->atr->min('harga')) }} - Rp
                                            {{ number_format($item->atr->max('harga')) }}
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-lg-4">
                    <div class="membership_chk_bg rght1528">
                        <div class="checkout_title">
                            <h4>Total</h4>
                            <img src="{{ asset('') }}assets/images/line.svg" alt="" />
                        </div>
                        <div class="order_dt_section">
                            <div class="order_title">
                                <h4>Harga Produk</h4>
                                <div class="order_price">Rp8.999</div>
                            </div>
                            <div class="order_title">
                                <h6>Diskon</h6>
                                <div class="order_price">0%</div>
                            </div>
                            <div class="order_title">
                                <h2>Total</h2>
                                <div class="order_price5">Rp8.999</div>
                            </div>



                            @if (Auth::check())
                                <a href="#" class="chck-btn22">Checkout Now</a>
                            @else
                                <div class="chck-btn22" data-bs-toggle="modal" data-bs-target="#modalLogin">Checkout Now
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('auth.login')
@endsection
