<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sdetail;
use DB;
use Auth;
use File;

class addnewController extends Controller
{
    public function storedata(Request $request){

        $this->validate($request,['studentphoto'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg','registerno'=>'required','studentname'=>'required','address'=>'required','email'=>'required|email|max:255','phoneno'=>'required|max:11','nic'=>'required|max:12|min:10',]);

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
