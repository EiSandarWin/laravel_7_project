<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:description-list|description-create|description-edit|description-delete', ['only' => ['index','show']]);
         $this->middleware('permission:description-create', ['only' => ['create','store']]);
         $this->middleware('permission:description-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:description-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
         $descriptions = Description::latest()->paginate(10);
        return view('descriptions.index',compact('descriptions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('descriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Description::create($request->all());
    
        return redirect()->route('descriptions.index')
                        ->with('success','Description created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Description $description
     * @return \Illuminate\Http\Response
     */
    public function show(Description $description)
    {
        return view('descriptions.show',compact('description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Description $description
     * @return \Illuminate\Http\Response
     */
    public function edit(Description $description)
    {
        return view('descriptions.edit',compact('description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Description $description
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Description $description)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $description->update($request->all());
    
        return redirect()->route('descriptions.index')
                        ->with('success','Description updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Description $description
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description)
    {
        $description->delete();
    
        return redirect()->route('descriptions.index')
                        ->with('success','Description deleted successfully');
    }
}
