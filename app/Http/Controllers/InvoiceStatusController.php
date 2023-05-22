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
        if (auth()->user()->hasPermissionTo('show invoices')){
            $info=Invoice::where('status','1')->get();
            return view('invoices.paied-invoices',['data'=>$info]);
        }
        return abort(404);
    }

    /**
     * get partialy paied invoices from database.
     */
    public function partialyPaiedInvoices()
    {
        if (auth()->user()->hasPermissionTo('show invoices')){
            $info=Invoice::where('status','2')->get();
            return view('invoices.partialy-invoices',['data'=>$info]);
        }
        return abort(404);
    }
    /**
     * get unpaied invoices from database.
     */
    public function unpaiedInvoices()
    {
        if (auth()->user()->hasPermissionTo('show invoices')){
            $info=Invoice::where('status','3')->get();
            return view('invoices.unpaied-invoices',['data'=>$info]);
        }
        return abort(404);
    }

    /**
     * show print invoice page from database.
     */
    public function printInvoice($id)
    {
        if (auth()->user()->hasPermissionTo('show invoices')){
            $invoices=Invoice::find($id);
            return view('invoices.print-invoice',compact('invoices'));
        }
        return abort(404);
    }
}
