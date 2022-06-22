@extends('templates.master')
@section('content')
    <div class="container">
        <br>
        <h1 class="text-dark">Daftar Voucher</h1>
            @if (Auth::user()->role == 'master')
                <br>
                <a href="{{ route('voucher.create') }}" class="btn btn-kenyang mb-5">Tambah Voucher</a>
            @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Voucher</th>
                <th scope="col">Potongan Harga</th>
                @if (Auth::user()->role == 'master')
                    <th scope="col">Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $voucher)
                <tr>
                <th scope="row">1</th>
                <td>{{ $voucher->name }}</td>
                <td>{{ $voucher->diskon }}</td>
                @if (Auth::user()->role == 'master')
                    <td class="d-flex">
                        <a class="btn btn-kenyang" href="{{ route('voucher.edit', $voucher->id) }}">Edit</a>
                        <form action="{{ route('voucher.delete', $voucher->id) }} " method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-kenyang">Hapus</button>
                        </form>
                    </td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection