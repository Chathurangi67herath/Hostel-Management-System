<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\sdetail;
use DB;
use Auth;
use File;

class addnewController extends Controller
{
    public function storedata(Request $request){

        // $this->validate($request,[
        //     'studentphoto'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        //     'registerno' => 'required|unique:sdetails,Register_Number',
        //     'studentname'=>'required',
        //     'address'=>'required',
        //     'email'=>'required|email|max:255|unique:sdetails,Email_Address',
        //     'phoneno'=>'required|max:11|unique:sdetails,Phone_Number',
        //     'nic'=>'required|max:12|min:10|unique:sdetails,Phone_Number',]);




             // Validation rules
    $rules = [
        'studentphoto'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        'registerno' => 'required|unique:sdetails,Register_Number',
        'studentname'=>'required',
        'address'=>'required',
        'email' => 'required|email|unique:sdetails,Email_Address',
        'phoneno' => 'required|unique:sdetails,Phone_Number',
        'nic'=>'required|max:12|min:10|unique:sdetails,Phone_Number',
        // Add other validation rules for other fields if needed
    ];

    // Custom error messages (optional)
    $customMessages = [
        'registerno.unique' => 'The register number must be unique.',
        'email.unique' => 'The email address must be unique.',
        'phoneno.unique' => 'The phone number must be unique.',
        // Add custom messages for other validation rules if needed
    ];

    // Validate the input data
    $validator = Validator::make($request->all(), $rules, $customMessages);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        if($file = $request->hasFile('studentphoto')) {

            $file = $request->file('studentphoto') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/Student_Photo' ;
            $file->move($destinationPath,$fileName);

        $sdetail=new sdetail;
       
        $sdetail->Student_Photo = $fileName;
        $sdetail->Register_Number = $request->registerno;
        $sdetail->Student_Name = $request->studentname;
        $sdetail->Home_Address = $request->address;
        $sdetail->Email_Address = $request->email;
        $sdetail->Phone_Number = $request->phoneno;
        $sdetail->NIC_No = $request->nic;
        $sdetail->save();
        $sdata=sdetail::all();
        return redirect('studentdetails')->with('newdata',$sdata);
        return redirect()->back();

}
}}
