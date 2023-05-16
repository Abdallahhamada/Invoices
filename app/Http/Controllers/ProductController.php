<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;
use App\Traits\SessionMessages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    Use SessionMessages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::with('section')->get();
        $sections=Section::get();
        return view('products.products',compact('data','sections'));
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
    public function store(ProductRequest $request)
    {
        $data=$request->validated();
        $value=Product::create($data);
        $this->messages($value);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Product::findOrFail($id);
        $sections=Section::whereHas('product')->get();
        return view('products.edit',compact('data','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request,$id)
    {
        $data=$request->validated();
        $value=Product::findOrFail($id)->update($data);
        $this->messages($value);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Product::findOrFail($id)->delete();
        $this->messages($data);
        return redirect()->back();
    }
}
