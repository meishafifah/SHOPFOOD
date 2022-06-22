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
            'diskon' => 'required'
        ]);

        Voucher::create([
            'name' => request()->name,
            'diskon' => request()->diskon
        ]);

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
            'name' => 'required',
            'diskon' => 'required'
        ]);
        
        $voucher->update([
            'name' => request()->name,
            'diskon' => request()->diskon,
        ]);

        return redirect()->route('voucher.index');
    }

    public function delete(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('voucher.index');
    }
}
