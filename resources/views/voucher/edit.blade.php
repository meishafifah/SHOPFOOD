@extends('templates.master')
@section('content')
    <div class="container py-5">
        <h1 class="text-dark">Edit Voucher</h1>
        <form action=" {{ route('voucher.update', $voucher->id) }} " method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Voucher</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input voucher name" value="{{ $voucher->name }}">
                @error('name')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="diskon" class="form-label">Potongan Harga</label>
                <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Input restaurant diskon" value="{{ $voucher->diskon }}">
                @error('diskon')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Masa Berlaku</label>
                <div class="row">
                    <div class="col-md-2">
                        <input class="form-control" type="date" name="start" id="start" value="{{ $voucher->start }}">
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="date" name="end" id="end" value="{{ $voucher->end }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="pemakaian" class="form-label">Batas Pemakaian</label>
                <input type="number" class="form-control" name="pemakaian" id="pemakaian" placeholder="Input restaurant pemakaian" value="{{ $voucher->pemakaian }}">
                @error('pemakaian')
                    <p class="text-danger small">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-kenyang" type="submit">Submit</button>
        </form>
    </div>
@endsection