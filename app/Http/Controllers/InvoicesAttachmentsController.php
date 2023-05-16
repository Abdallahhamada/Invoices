<?php

namespace App\Http\Controllers;

use App\Models\InvoicesAttachments;
use Illuminate\Http\Request;

class InvoicesAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoicesAttachments $invoicesAttachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoicesAttachments $invoicesAttachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoicesAttachments $invoicesAttachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($invoice_number)
    {
        $invoice=InvoicesAttachments::where('invoice_number',$invoice_number)->delete();
        $name='store/'.$invoice->file_name;
        unset($name);
        return redirect()->back();
    }
}
