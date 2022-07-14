<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Invoice;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    { 
        return view('transaction.index');
    }

    public function endPointData()
    {
        if (auth()->user()->role == 'admin') {
            $restaurant = auth()->user()->restaurant;
            $invoices = $restaurant->invoices;
        } else {
            $invoices = auth()->user()->invoices;
        }
        
        $total = $invoices->sum('total');

        $endPoint = [
            'invoices' => $invoices,
            'total' => $total
        ];
        return $endPoint;
    }

    public function filter()
    {
        if (request()->monthYear == '') {
            $invoices = Invoice::get();
            $total = $invoices->sum('total');
        } else {
            $monthYear = explode("-",request()->monthYear);
            $invoices = Invoice::whereYear('created_at', $monthYear[0])->whereMonth('created_at', $monthYear[1])->get();
    
            $total = $invoices->sum('total');
        }

        return view('transaction.index', [
            'invoices' => $invoices,
            'total' => $total
        ]);
    }

    public function showInvoice(Invoice $invoice)
    {
        $boughts = Bought::where('invoice_id', $invoice->id)->get();

        return view('transaction.invoices', [
            'invoice' => $invoice,
            'boughts' => $boughts,
        ]);
    }

    public function changeStatusInvoice(Invoice $invoice, $status)
    {
        $invoice->update([
            'status' => $status
        ]);

        return redirect()->back();
    }
}
