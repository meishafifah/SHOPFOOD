<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('voucher.index', [
            'vouchers' => $vouchers
        ]);
    }

    public function create()
    {
        return view('voucher.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'unique:restaurants|required',
            'diskon' => 'required',
            'start' => 'required',
            'end' => 'required',
            'pemakaian' => 'required',
        ]);

        $start = request()->start;
        $end = request()->end;
        // $start = explode("-",request()->start);
        // $end = explode("-",request()->end);

        Voucher::create([
            'name' => request()->name,
            'diskon' => request()->diskon,
            'start' => $start,
            'end' => $end,
            'pemakaian' => request()->pemakaian,
        ]);

        $pemakaian = Voucher::whereMonth('start', $end[0])->whereDate('start', $end[1])->get();

        return redirect()->route('voucher.index');
    }

    public function edit(Voucher $voucher)
    {
        return view('voucher.edit', [
            'voucher' => $voucher
        ]);
    }

    public function update(Voucher $voucher)
    {
        request()->validate([
            'name' => 'unique:restaurants|required',
            'diskon' => 'required',
            'start' => 'required',
            'end' => 'required',
            'pemakaian' => 'required',
        ]);
        
        $voucher->update([
            'name' => request()->name,
            'diskon' => request()->diskon,
            $start = 'start' => request()->start,
            $end = 'end' => request()->end,
            'pemakaian' => request()->pemakaian,
        ]);

        return redirect()->route('voucher.index');
    }

    public function delete(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('voucher.index');
    }
}
