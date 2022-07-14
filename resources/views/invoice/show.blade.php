@extends('templates.master')

@section('content')
<section>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <h1 class="righteous">Rincian Pesanan</h1>
            </div>
        </div>
        <div class="keranjang">
            <div class="block-white">
                <h4 class="text-center righteous">Invoice</h4>

                <div class="mt-4">
                    <h5 class="righteous">Alamat Pengiriman</h5>
                    <div class="p-300">{{Auth::user()->name}} | {{ $invoice->payment }}</div>
                    <div class="p-300">{{ $invoice->address }}</div>
                </div>

                @foreach ($boughts as $bought)
                <div class="mt-4">
                    <div class="row">
                        <h3 class="righteous mb-4">{{ $bought->restaurant->name }}</h3>
                        <div class="col-md-2">
                            <img src="{{asset('storage/'.$bought->menu->picture)}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h4 class="righteous">{{ $bought->menu->name }}</h4>
                            <p class="p-300">{{$bought->quantity}} x</p>
                            <p>{{ $bought->note }}</p>
                        </div>
                        <div class="col-md-3 kanan align-self-end">
                            <h4 class="p-500 biru kanan">RP {{ $bought->menu->price }}</h4>
                        </div>
                        <hr class="mt-3">
                    </div>
                </div>
                @endforeach


                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Subtotal Pesanan</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan">RP {{ $invoice->subtotal }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Biaya Pengiriman</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan">RP {{ $invoice->shipping }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Biaya Layanan</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan">RP {{ $invoice->service }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Potongan Harga</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan">- RP {{ $invoice->discount }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="bold">Total</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="kanan bold">RP {{ $invoice->total }}</h4>
                        </div>
                    </div>
                </div>

                <hr class="mt-3">

                <div>
                    <h4 class="bold mb-3">Rincian Pesanan</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <p>ID Order</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan bold">{{ $invoice->id }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Waktu Pemesanan</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan bold">{{ $invoice->created_at }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Pembayaran</p>
                        </div>
                        <div class="col-md-6">
                            <p class="kanan bold">{{ $invoice->payment }}</p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        <div class="text-center">
            <a href="{{ route('index') }}" class="btn btn-kenyang mt-4">Pesan Lagi</a>
        </div>
    </div>
</section>
@endsection