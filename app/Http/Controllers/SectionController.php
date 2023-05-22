<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use App\Traits\SessionMessages;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use SessionMessages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=Section::all();
            return view('sections.sections',compact('data'));
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
    public function store(SectionRequest $request)
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=$request->validated();
            $value=Section::create($data);
            $this->messages($value);
            return redirect()->back();
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=Section::with('product')->findOrFail($id);
            return $data->product;
        }
        return abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=Section::findOrFail($id);
            return view('sections.edit-sections',compact('data'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, $id)
    {
        if (auth()->user()->hasPermissionTo('show products')){
            $data=$request->validated();
            $value=Section::findOrFail($id)->update($data);
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
            $data=Section::findOrFail($id)->delete();
            $this->messages($data);
            return redirect()->back();
        }
        return abort(404);

    }
}
