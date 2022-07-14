
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOPFOOD : Website Pesan Antar Makanan Online</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css.map') }}">    --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleuser.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" type=""> --}}
    
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
                            @endif

                            @if (Auth::user()->role == 'admin')
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('index') }}">Beranda</a>
                              </li>
                            {{-- Voucher --}}
                              <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('voucher.index') }}">Voucher</a>
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
                                <a class="nav-link text-white" href="{{ route('cart.index') }}">Keranjang</a>
                              </li>
                              {{-- Akun --}}
                              <li class="nav-item">
                                  <a class="nav-link text-white" href="{{ route('account.index') }}">Akun</a>
                              </li>
                            @endif
                            
                          @endif
                            {{-- Transaksi --}}
                            <li class="nav-item">
                              <a class="nav-link text-white" href="{{ route('transaction.index') }}">Transaksi</a>
                            </li>
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
        <footer class="b-0">developed by SHOPFOOD</footer>
        </section>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    @if (Auth::user())
      <?php 
        $userName = Auth::user()->name
      ?>
      
      <script>
        let invoiceContent = document.getElementById('invoiceData');
        let nama = <?= json_encode($userName)?>;
        let temp =`
        <tr class="text-center">
          <th><h6>Nama Pembeli</h6></th>
          <th><h6>Alamat</h6></th>
          <th><h6>Pembayaran</h6></th>
          <th><h6>Total</h6></th>
          <th><h6>Status</h6></th>
          <th><h6>Detail</h6></th>
        </tr>     
        `;

        let url = '{{route("transaction.showInvoice", ":id")}}'
        
        $.ajax({
          type: 'get', 
          url: 'http://127.0.0.1:8000/transaction/endpointdata',
          dataType: 'json',
          success: function(endPointData) {
              endPointData.invoices.forEach(x =>{
                console.log(`${x.id}`)
                console.log()
                temp += `
                <tr>
                <td>${nama}</td>
                      <td>${x.address}</td>
                      <td>${x.payment}</td>
                      <td>${x.total}</td>
                      <td>${x.status}</td>
                      <td class="text-center"><a class="text-decoration-none text-black" href="${url.replace(':id', x.id)}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                      </a></td>
                      </tr>
                `
              })
              
              invoiceContent.innerHTML= temp
          },
          error: function(){
            console.log("gagal")
          }
        })
      </script>
    @endif
    </html>