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
                    <h1 class="p-700 text-dark">{{ $restaurant->name }}</h1>
                    <p class="text-dark">{{ $restaurant->description }}</p>
                    <p class="text-dark">
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
                    <p class="text-dark">masukkan kode MANTAP untuk mendapatkan diskon 30% , syarat dan ketentuan berlaku</p>
                </div>
            </div>

            <hr class="mb-4 text-dark">
            
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            {{-- pastikan master : admin utama --}}
            @if (Auth::user())
                @if (Auth::user()->role == "master" || Auth::user()->id == $restaurant->user_id)
                    <a class="btn btn-kenyang" href=" {{ route('menu.create', $restaurant->slug) }} ">Tambah menu</a>
                @endif
            @endif
        

            <div class="row mt-5">
                @foreach ($menus as $item => $menu) 
                    <div class="col-md-4">
                        <div class="block-menu text-dark">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="ic-menu" src="{{asset('storage/'.$menu->picture)}}" alt="">
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <h4>{{ $menu->name }}</h4>
                                    <br>
                                    <h4 class="biru">RP {{ $menu->price }}</h4>
                                </div>
                            </div>
                            <p class="mt-2">{{ $menu->description }}</p>
                            <div class="row">
                                @if (Auth::user())
                                    @if (Auth::user()->role == "master" || Auth::user()->id == $restaurant->user_id)
                                    <div class="d-flex mt-3">  
                                        <a href=" {{ route('menu.edit', $menu->id) }} " class="btn btn-kenyang me-2">Edit</a>
                                        
                                        <form action="{{ route('menu.delete', $menu->id) }} " method="post">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" class="btn btn-kenyang">Hapus</button>
                                        </form>
                                    </div> 
                                    @else 
                                    <form action="{{route('addToCart', [$restaurant->id, $menu->id])}}" method="post">
                                        @csrf
                                        <div class="row">
                                                <div class="col-md-8">
                                                    <div class="d-flex justify-content-end">
                                                        <div class="no-btn" onclick="decrement({{$item}})">
                                                            <img src="{{asset('assets/img/ic-minus.png')}}" alt="">
                                                        </div>

                                                        <input class="text-center text-dark" id="quantity{{$item}}" name="quantity" type="number" min=1 value="1">
                                                        
                                                        <div class="no-btn" onclick="increment({{$item}})">
                                                            <img src="{{asset('assets/img/ic-plus.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="button-keranjang">
                                                        <button type="submit" class="btn">
                                                            <img src="{{asset('assets/img/ic-cart.png')}}" alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function increment(urutan) {
            document.getElementById(`quantity${urutan}`).stepUp();
        }
        function decrement(urutan) {
            document.getElementById(`quantity${urutan}`).stepDown();
        }
    </script>

@endsection