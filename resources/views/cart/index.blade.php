@extends('templates.master')
@section('content')
<section>
    <div class="container">
        <div class="row mt-4 mb-4">
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-12">
                <h1 class="righteous">HY MY LOVE</h1>
                <P>This your favorit food</P>
            </div>
        </div>
        <div class="block-white">
            @foreach ($carts as $cart)
                <div class="row">
                    <h3 class="righteous mb-4 text-white">{{$cart->menu->restaurant->name}}</h3>
                    <div class="col-md-3">
                        <img src="{{asset('storage/'. $cart->menu->picture)}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h4 class="righteous text-white">{{$cart->menu->name}}</h4>
                        <p class="p-300 text-white">{{$cart->quantity}} x</p>
                        <h4 class="p-500 text-white biru">Rp {{$cart->menu->price}}</h4>
                    </div>
                    <div class="col-md-3 kanan">
                        <div class="btn btn-keranjang text-black ">
                            <form action="{{route('cart.delete', $cart->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="no-btn" type="submit">hapus</button>
                            </form>
                        </div>
                    </div>
                    
                    <hr class="mt-3">
                </div>
            @endforeach
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="p-300 text-white">Total : <span class="p-500 text-white biru">RP {{$total}}</span></h4>
                    </div>
                    <div class="col-md-3 kanan">
                        <div class="text-black">
                            <a href=" {{route('cart.checkout')}} " class="btn btn-keranjang ">Checkout</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

@endsection