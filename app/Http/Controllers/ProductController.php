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
        if (auth()->user()->hasPermissionTo('show products')){
            $data=Product::with('section')->get();
            $sections=Section::get();
            return view('products.products',compact('data','sections'));
        }
        return abort(404);
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
        if (auth()->user()->hasPermissionTo('add products')){
            $data=$request->validated();
            $value=Product::create($data);
            $this->messages($value);
            return redirect()->back();
        }
        return abort(404);
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
        if (auth()->user()->hasPermissionTo('edit products')){
            $data=Product::findOrFail($id);
            $sections=Section::whereHas('product')->get();
            return view('products.edit-products',compact('data','sections'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request,$id)
    {
        if (auth()->user()->hasPermissionTo('edit products')){
            $data=$request->validated();
            $value=Product::findOrFail($id)->update($data);
            $this->messages($value);
            return redirect()->back();
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=Product::findOrFail($id)->delete();
            $this->messages($data);
            return redirect()->back();
        }
        return abort(404);
    }
}
