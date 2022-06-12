@extends('templates.master')

@section('content')
    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 txt">
                    <h1 class="p-700 text-white" >SHOPFOOD</h1>
                    <p class="text-white">Kamu bingung mau makan apa hari ini? Coba deh kamu cek menu-menu enak dengan klik tombol dibawah ini</p>
                    <!--SEARCH-->
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="explore your favorit food">
                        <button class="btn text-black" type="button">search</button>
                      </form>
                </div>
                <div class="row col-md-6">
                    <img class="w-100" src="{{ asset('assets/img/driver.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Menu -->
    <section class="menu">
        <div class="block-hr">
            <h2>Participating Stores</h2>
        </div>
        <div class="container">
            {{-- pastikan master : admin utama --}}
            @if (Auth::user())
                @if (Auth::user()->role == "master")
                    <a class="btn btn-kenyang" href=" {{ route('restaurant.create') }} ">Tambah restoran</a>
                @endif
            @endif

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="{{ asset('assets/img/line.png')}}" alt=""></span> Banyak Promo</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurantPromo as $restaurant)
                    <div class="col-md-3">
                        <a href="{{ route('restaurant.show', $restaurant->slug) }}">
                            <div class="card">
                                <img src="{{asset('storage/'. $restaurant->picture)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text p-300">0.5 km</p>
                                    <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                                    <p class="card-text"><span><img class="star" src="{{ asset('assets/img/ic-star.png')}}" alt=""></span> {{ $restaurant->rating }}</p>
                                </div>
                                @if (Auth::user())
                                    @if (Auth::user()->role == 'master')
                                    <div class="d-flex mt-3">  
                                        <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                        
                                        <form action="{{ route('restaurant.delete', $restaurant->slug) }} " method="post">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" class="btn btn-kenyang">Hapus</button>
                                        </form>
                                    </div> 
                                    @endif
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
                
            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="{{ asset('assets/img/line.png')}}" alt=""></span> Toko Ter-Populer</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurantPopuler as $restaurant)
                <div class="col-md-3">
                    <a href="{{ route('restaurant.show', $restaurant->slug) }}">
                        <div class="card">
                            <img src="{{asset('storage/'. $restaurant->picture)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text p-300">0.5 km</p>
                                <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                                <p class="card-text"><span><img class="star" src="{{ asset('assets/img/ic-star.png')}}" alt=""></span> {{ $restaurant->rating }}</p>
                            </div>
                            @if (Auth::user())
                            @if (Auth::user()->role == 'master')
                            <div class="d-flex mt-3">  
                                <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                
                                <form action="{{ route('restaurant.delete', $restaurant->slug) }} " method="post">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn btn-kenyang">Hapus</button>
                                </form>
                            </div> 
                            @endif
                        @endif

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
 
                <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="{{ asset('assets/img/line.png')}}" alt=""></span> Rekomendasi</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurantRekomendasi as $restaurant)
                <div class="col-md-3">
                    <a href="{{ route('restaurant.show', $restaurant->slug) }}">
                        <div class="card">
                            <img src="{{asset('storage/'. $restaurant->picture)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text p-300">0.5 km</p>
                                <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                                <p class="card-text"><span><img class="star" src="{{ asset('assets/img/ic-star.png')}}" alt=""></span> {{ $restaurant->rating }}</p>
                            </div>
                            @if (Auth::user())
                            @if (Auth::user()->role == 'master')
                            <div class="d-flex mt-3">  
                                <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                
                                <form action="{{ route('restaurant.delete', $restaurant->slug) }} " method="post">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn btn-kenyang">Hapus</button>
                                </form>
                            </div> 
                            @endif
                        @endif

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection