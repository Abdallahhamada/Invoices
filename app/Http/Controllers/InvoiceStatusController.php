<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceStatusController extends Controller
{

    /**
     * get paied invoices from database.
     */
    public function paiedInvoices()
    {
        $info=Invoice::where('status','1')->get();
        return view('invoices.paied-invoices',['data'=>$info]);
    }

    /**
     * get partialy paied invoices from database.
     */
    public function partialyPaiedInvoices()
    {
        $info=Invoice::where('status','2')->get();
        return view('invoices.partialy-invoices',['data'=>$info]);
    }
    /**
     * get unpaied invoices from database.
     */
    public function unpaiedInvoices()
    {
        $info=Invoice::where('status','3')->get();
        return view('invoices.unpaied-invoices',['data'=>$info]);
    }

    /**
     * show print invoice page from database.
     */
    public function printInvoice($id)
    {
        $invoices=Invoice::find($id);
        return view('invoices.print-invoice',compact('invoices'));
    }
}
