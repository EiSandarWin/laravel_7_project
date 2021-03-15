<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request->validate([
            'name'=> 'required|min:5',
            'parent_name'=>'required|min:5',
            'branch_name'=>'required',
            'signature'=>'required|mimes:jpg,jpeg,bmp,png'
            
        ]);

        
        //$data_uri = "data:image/png;base64,iVBORw0K...";
        //$encoded_image = explode(",", $data_uri)[1];
        //$decoded_image = base64_decode($encoded_image);
        //Storage::put('signature.png', $decoded_image, 'public');

        $folderPath = public_path('upload/');
       
        $image_parts = explode(";base64,", $request->signed);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);
 
        //store data
        $student =new Student();
        $student->name = $request->name;
        $student->parent_name = $request->parent_name;
        $student->branch_name = $request->branch_name;
        //$student->signature = $signature;
        $student->save();

        return back()->with('success', 'Form successfully submitted with signature');
    }

    /**
     * Display the specified resource.

     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
