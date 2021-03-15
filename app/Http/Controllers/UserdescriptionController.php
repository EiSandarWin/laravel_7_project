<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;

class UserdescriptionController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         $descriptions = Description::latest()->paginate(10);
        return view('user',compact('descriptions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


        
    }
}

