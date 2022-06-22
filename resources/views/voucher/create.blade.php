@extends('templates.master')
@section('content')
    <div class="container py-5">
        <h1 class="text-dark">Buat Voucher</h1>
        <form action=" {{ route('voucher.store') }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Voucher</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input voucher name">
                @error('name')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="diskon" class="form-label">Potongan Harga</label>
                <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Input restaurant diskon">
                @error('diskon')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-kenyang" type="submit">Submit</button>
        </form>
    </div>
@endsection