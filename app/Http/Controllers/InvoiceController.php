<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceEditRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\InvoicesAttachments;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\SessionMessages;

class InvoiceController extends Controller
{
    use SessionMessages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Invoice::all();
        return view('invoices.invoices',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections=Section::whereHas('product')->get();
        return view('invoices.add-invoice',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        $data=$request->validated();
        $result=array_merge(['status'=>'3'],$data);
        $lastID=Invoice::create($result);
        $full=array_merge(['user'=>auth()->user()->name,'invoice_id'=>$lastID->id],$result);
        $detect=InvoiceDetail::create($full);
        if ($request->hasFile('pic')){
            $photo=$request->pic->store('','invoices');
            $fullData=array_merge(['file_name'=>$photo],$full);
            InvoicesAttachments::create($fullData);
        }

        $this->messages($detect);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoice=Invoice::findOrFail($id);
        $invoiceDetails=InvoiceDetail::where('invoice_number',$invoice->invoice_number)->get();
        $invoiceAttachment=InvoicesAttachments::where('invoice_number',$invoice->invoice_number)->get();
        if ($invoiceDetails->isNotEmpty() && $invoiceAttachment->isNotEmpty()){
            return view('invoices.show-invoice',['invoice'=>$invoice,'invoiceDetails'=>$invoiceDetails[0],'invoiceAttachments'=>$invoiceAttachment[0]]);
        }elseif($invoiceDetails->isNotEmpty()){
            return view('invoices.show-invoice',['invoice'=>$invoice,'invoiceDetails'=>$invoiceDetails[0]]);
        }else{
            return view('invoices.show-invoice',['invoice'=>$invoice]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice=Invoice::findOrFail($id);
        $sections=Section::whereHas('product')->get();
        return view('invoices.edit-invoice',['invoice'=>$invoice,'sections'=>$sections]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceEditRequest $request,$id)
    {
        $data=$request->validated();
        Invoice::where('id',$id)->update($data);
        $detect=InvoiceDetail::where('invoice_number',$data)->update([
            'invoice_number'=>$data['invoice_number'],
            'product'=>$data['product'],
            'section_id'=>$data['section_id'],
            'status'=>$data['status'],
            'note'=>$data['note'],
        ]);
        $this->messages($detect);
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Invoice::findOrFail($id);
        $data->delete();
        $detail=InvoiceDetail::where('invoice_number',$data->invoice_number);
        $attach=InvoicesAttachments::where('invoice_number',$data->invoice_number);
        if ($detail){
            $detail->delete();
            if ($attach){
                $fName=$attach->get();
                unlink('storage/invoices/'.$fName[0]->file_name);
                $attach->delete();
            }
        }
        $this->messages($data);
        return redirect()->back();
    }
}
