<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOPFOOD : Website Pesan Antar Makanan Online</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleuser.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <source src="{{ asset('assets/js/bootstrap.min.js') }}" type="">
    <link rel="icon" href="{{ asset('assets/img/logo-02.svg') }}" type="image/x-icon">
</head>
<body class="account">
    <!-- navbar -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand text-white righteous" href="{{ route('index') }}">
                  <img src="{{ asset('assets/img/logo-02.png') }}" alt="">
                  SHOPFOOD
              </a>
              <span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li>
                          @guest
                          {{-- belum login register --}}
                            {{-- register --}}
                              @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn text-black">Daftar</a>
                              @endif

                            {{-- login --}}
                              @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn text-black">Masuk</a>
                              @endif
                          {{-- belum login register --}}

                          @else
                          
                          {{-- user sudah login --}}
                          @if (Auth::user())

                            @if (Auth::user()->role == 'master')
                              <li class="nav-item">
                                <a class="nav-link active text-white p400" aria-current="page" href="{{ route('index') }}">Beranda</a>
                              </li>   
                              {{-- Request --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('request.index') }}">Permintaan</a>
                              </li>
                              {{-- Voucher --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('voucher.index') }}">Voucher</a>
                              </li>
                              {{-- Transaksi --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#">Transaksi</a>
                              </li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#">Home</a>
                              </li>
                            {{-- Voucher --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('voucher.index') }}">Voucher</a>
                              </li>
                            {{-- Transaksi --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#">Transaksi</a>
                              </li>
                            {{-- Akun --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('account.index') }}">Akun</a>
                              </li>
                            @endif

                            @if (Auth::user()->role == 'user')
                              <li class="nav-item">
                                <a class="nav-link active text-white p400" aria-current="page" href="{{ route('index') }}">Beranda</a>
                              </li>    
                              {{-- Keranjang --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#">Keranjang</a>
                              </li>
                              {{-- Akun --}}
                              <li class="nav-item">
                                  <a class="nav-link text-white" href="{{ route('account.index') }}">Akun</a>
                              </li>
                            @endif
                            
                          @endif
                            <li class="nav-item">
                              <a class="nav-link text-white" href="#">Hai {{ Auth::user()->name }} 🌝</a>
                            </li>
                            {{-- Logout --}}
                              <a class="btn text-black" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form> 
                          @endguest
                        </li>
                      </ul>
                </span>
            </div>
          </nav>
        </div>
    </section>

    @yield('content')

    <!-- footer -->
    <section>
        <footer>developed by SHOPFOOD</footer>
        </section>
    </body>
    </html>