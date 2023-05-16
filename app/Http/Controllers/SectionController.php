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
        $data=Section::all();
        return view('sections.sections',compact('data'));
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
        $data=$request->validated();
        $value=Section::create($data);
        $this->messages($value);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Section::with('product')->find($id);
        return $data->product;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Section::findOrFail($id);
        return view('sections.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, $id)
    {
        $data=$request->validated();
        $value=Section::findOrFail($id)->update($data);
        $this->messages($value);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Section::findOrFail($id)->delete();
        $this->messages($data);
        return redirect()->back();

    }
}
