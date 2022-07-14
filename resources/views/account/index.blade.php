@extends('templates.master')
@section('content')
    <section>
        <section class="text-dark mb-5">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Ingin menjadi salah satu barisan toko dengan penghasilan tinggi di SHOPFOOD ? <strong><a href="{{ route('request.create') }}">Request toko anda sekarang!</a></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 txt">
                        @if (Auth::user()->role == 'admin')
                            <h1 class="p-700 text-black" >Information Outlet</h1>
                        @else
                        <h1 class="p-700 text-black" >Information Account</h1>
                        @endif
                        <p class="text-Secondary">Contact</p>
                        <div class="info-admin">
                            <p>No Handphone :</p>
                            <p>{{ Auth::user()->phone }}</p>
                            <p>Emai Terdaftar  :</p> 
                            <p>{{ Auth::user()->email }}</p> 
                        </div>
                    </div>
                    <div class="row col-md-6 txt">
                        <p class="text-Secondary">Alamat</p>
                        <div class="info-admin">
                        @if (Auth::user()->role == 'admin')
                            <p>Alamat lengkap Outlet :</p>
                        @else
                            <p>Alamat lengkap User:</p>                        
                        @endif
                        <p>{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection