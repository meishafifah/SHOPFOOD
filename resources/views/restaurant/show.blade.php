@extends('templates.master')
@section('content')
    <!-- info makanan -->
    <section class="toko">
        <div class="cover">
            <img class="w-100" src="{{asset('storage/'. $restaurant->picture)}}" alt="">
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-7">
                    <h1 class="p-700">{{ $restaurant->name }}</h1>
                    <p>{{ $restaurant->description }}</p>
                    <p>
                        <img src="{{ asset('assets/img/ic-star.png')}} " alt="">
                        <img src="{{ asset('assets/img/ic-star.png')}} " alt="">
                        <img src="{{ asset('assets/img/ic-star.png')}} " alt="">
                        <img src="{{ asset('assets/img/ic-star.png')}} " alt="">
                        <img src="{{ asset('assets/img/ic-star.png')}} " alt="">
                        {{ $restaurant->rating }} (100+)
                    </p>
                </div>

                <div class="col-md-5">
                    <div class="kupon mb-2">
                        <h3 class="righteous">kode : MANTAPP</h3>
                    </div>
                    <p>masukkan kode MANTAP untuk mendapatkan diskon 30% , syarat dan ketentuan berlaku</p>
                </div>
            </div>

            <hr class="mb-5">

            <div class="row">
                <div class="col-md-4">
                    <div class="block-menu">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="ic-menu" src="{{ asset('assets/img/bakso-ikan.jpg')}}" alt="">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <h4>bakso-ikan</h4>
                                <p>456 terjual</p>
                                <h4 class="biru">RP 25.000</h4>
                            </div>
                        </div>
                        <p class="mt-2">bakso ikan kualitas unggul enak tanpa msg dan pengawet dijamin sehat</p>
                        <div class="row">
                            <div class="col-md-8">
                                <img src="img/ic-minus.png" alt="">
                                <input type="number" >
                                <img src="img/ic-plus.png" alt="">
                            </div>
                            <div class="col-md-4">
                                <div class="btn">
                                    <img src="img/ic-cart.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection