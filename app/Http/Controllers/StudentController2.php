<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.signature-pad');
    }
 
    public function store(Request $request)
    {

        
        $data_uri = "upload:image/png;base64,iVBORw0K...";
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        file_put_contents("signature.png", $decoded_image);
 
        $save = new Studentinfo;
        $save->name = $request->name;
        $save->parentname = $request->parentname;
        $save->branchname = $request->branchname;
        $save->signature = $signature;
        $save->save();
    
 
        return back()->with('success', 'Form successfully submitted with signature');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
