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
            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="{{ asset('assets/img/line.png')}}" alt=""></span> Banyak Promo</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                    
                                <img src="{{ asset('assets/img/kembung.jpg')}}" class="card-img-top" alt="...">
                            
                            
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">ikan kembung, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="{{ asset('assets/img/ic-star.png')}}" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/salmoo.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">ikan salmon, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/scallop.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">scallop, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/udang.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Udang, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Toko Ter-Populer</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/cumi.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">cumi, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/gurita.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">gurita, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/bakso-ikan.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">bakso ikan, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/crab1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Crab Sticke, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Rekomendasi</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/kakap.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">kakap merah, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/kerang-dara1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Kerang Dara, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/kerang-ijo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">kerang hijau, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/kerang-simping.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">kerang simping, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection