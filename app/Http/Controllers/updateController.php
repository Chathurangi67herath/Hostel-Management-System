<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\sdetail;
use DB;
use Auth;
use File;

class updateController extends Controller
{
    public function update($id){
        $sdetail=sdetail::find($id);
       return view('editupdatedetails')->with('newdata',$sdetail);

     }
     public function deletephoto($id){
        $sdetail=sdetail::findOrFail($id);
        if(File::exists("Student_Photo/".$sdetail->Student_Photo)){
            File::delete("Student_Photo/".$sdetail->Student_Photo);
        }
        return view('editupdatedetails')->with('newdata',$sdetail);

     }

     public function storeeditdata(Request $request){
        //$this->validate($request,['studentphoto'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg','registerno'=>'required','studentname'=>'required','address'=>'required','email'=>'required|email|max:255','phoneno'=>'required|max:10','nic'=>'required|max:12|min:10',]);

        $id = $request->id;
        $rules = [
            'studentphoto'=>'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            'registerno' => [
                'required',
                Rule::unique('sdetails', 'Register_Number')->ignore($id),
            ],
            'studentname'=>'required',
            'address'=>'required',
            'email' => [
                'required',
                'email',
                Rule::unique('sdetails', 'Email_Address')->ignore($id),
            ],
            'phoneno' => [
                'required',
                'max:10',
                Rule::unique('sdetails', 'Phone_Number')->ignore($id),
            ],
            'nic' => [
                'required',
                'max:12',
                'min:10',
                Rule::unique('sdetails', 'NIC_No')->ignore($id),
            ],
            // Add other validation rules for other fields if needed
        ];

        // Custom error messages (optional)
        $customMessages = [
            'registerno.unique' => 'Now you entered register number already exist.',
            'email.unique' => 'Now you entered email address already exist..',
            'phoneno.unique' => 'Now you entered phone number already exist..',
            // Add custom messages for other validation rules if needed
        ];

        // Validate the input data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $id=$request->id;
        $Register_Number=$request->registerno;
        $Student_Name=$request->studentname;
        $Home_Address= $request->address;
        $Email_Address=$request->email;
        $Phone_Number=$request->phoneno;
        $NIC_No=$request->nic;

        $sdetail=sdetail::findOrFail($id);
        if($file = $request->hasFile('studentphoto')) {
            if(File::exists("Student_Photo/".$sdetail->Student_Photo)){
                File::delete("Student_Photo/".$sdetail->Student_Photo);
            }

            $file = $request->file('studentphoto') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/Student_Photo' ;
            $file->move($destinationPath,$fileName);
            $sdetail->Student_Photo=$fileName;
     }
        $sdetail->Register_Number=$Register_Number;
        $sdetail->Student_Name= $Student_Name;
        $sdetail->Home_Address= $Home_Address;
        $sdetail->Email_Address=$Email_Address;
        $sdetail->Phone_Number= $Phone_Number;
        $sdetail->NIC_No= $NIC_No;
        $sdetail->save();
        $sdetail=sdetail::all();
        return redirect('studentdetails')->with('newdata',$sdetail);

}



}

