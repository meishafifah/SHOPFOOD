@extends('templates.master')
@section('content')
<div class="container keranjang pt-5 min-vh-100">
    <h1 class="mb-3 text-dark">Riwayat Transaksi</h1>
    <form method="post" action="{{route('transaction.filter')}}" class="row align-item-center mb-3">
        @csrf
        <div>
            <p class="text-dark">Tampilkan Transaksi pada</p>
        </div>
        <div class="col-md-2">
            <input class="form-control" type="month" name="monthYear" id="monthYear">
        </div>
        
        <div class="col-md-1">
            <button class="btn btn-kenyang color-blue text-white" type="submit">Filter</button>
        </div>
    </form>
    
    <div class="block-white color-cream">
        <table class="table table-hover" id="invoiceData">
            
            <tr >
                
            </tr>
            {{-- @foreach ($invoices as $invoice)
                <tr class="text-center">
                    <td>{{$invoice->user->name}}</td>
                    <td>{{$invoice->address}}</td>
                    <td>{{$invoice->payment}}</td>
                    <td>{{$invoice->total}}</td>
                    <td>{{$invoice->status}}</td>
                    <td class="text-center"><a class="text-decoration-none text-black" href="{{route('transaction.showInvoice', $invoice->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </a></td>
                </tr>
            @endforeach

            <tr>
                <td colspan="5"><h4 class="righteous kanan mb-0">Total</h4></td>
                <td><h4 class="righteous mb-0">{{$total}}</h4></td>
            </tr> --}}
        </table>
    </div>

</div>
@endsection