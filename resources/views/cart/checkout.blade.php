@extends('templates.master')
@section('content')
<section \>

    <form action="{{route('create.invoice')}}" method="post">
        @csrf
    <div class="container keranjang">
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <h1 class="righteous text-dark">Konfirmasi Pesanan</h1>
            </div>
        </div>
        <div class="block-white mb-4 alamat text-white">
            <div class="row">
                <h3 class="righteous">Alamat Pengiriman</h3>
                    <p>{{Auth::user()->name}}</p>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Input your address">{{Auth::user()->address}}</textarea>
            </div>
        </div>

        <div class="block-white mb-4 text-white">
            @foreach ($carts as $cart)
                
            <div class="row">
                <h3 class="righteous mb-4">{{$cart->menu->restaurant->name}}</h3>
                <div class="col-md-3">
                    <img src="{{asset('storage/'.$cart->menu->picture)}}" alt="">
                </div>
                <div class="col-md-6">
                    <h4 class="righteous">{{$cart->menu->name}}</h4>
                    <p class="p-300">{{$cart->quantity}} x</p>
                </div>
                <div class="col-md-3 kanan align-self-end">
                    <h4 class="p-500 kanan">Rp {{$cart->menu->price}}</h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h4>Catatan : </h4>
                </div>
                <div class="col-md-8 kanan">
                    <h5 class="p-500">{{$cart->note}}</h5>
                </div>
            </div>

            <hr class="mt-3">

            @endforeach

            <div class="row">
                <div class="col-md-6">
                    <h4 class="p-300">Subtotal : </h4>
                </div>
                <div class="col-md-6 kanan">
                    <h4 class="p-500 kanan">RP {{$subtotal}}</h4>
                </div>
            </div>
        </div>

            <div class="block-white mb-4 text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="righteous">Voucher</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <input class="form-control kanan" type="text" name="voucher" placeholder="Ketikkan kode voucher">
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="block-white mb-4 text-white">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="righteous">Pilihan Pembayaran</h4>
                    </div>
                    <div class="col-md-6">
                        <select name="payment" class="form-select kanan pilihan">
                            <option selected value="">Pilih</option>
                            <option value="cod">COD</option>
                          </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Subtotal Pesanan</p>
                    </div>
                    <div class="col-md-6">
                        <p class="kanan">RP {{$subtotal}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Biaya Pengiriman</p>
                    </div>
                    <div class="col-md-6">
                        <p class="kanan">RP {{$shipping}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Biaya Layanan</p>
                    </div>
                    <div class="col-md-6">
                        <p class="kanan">RP {{$service}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="bold">Total</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="kanan bold">RP {{$total}}</h4>
                    </div>
                </div>
            </div>
    
            <div class="kanan-web">
                <div class="for-btn">
                    <div class="row d-flex">
                        <div class="kanan">
                            <button type="submit" class="btn btn-kenyang">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>

@endsection