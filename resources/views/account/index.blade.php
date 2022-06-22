@extends('templates.master')
@section('content')
    <section>
        <section class="text-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 txt">
                        <h1 class="p-700 text-black" >information Outlet</h1>
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
                        <p>Alamat lengkap Outlet :</p>
                        <p>{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection