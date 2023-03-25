<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use App\models\login;
use Hash;
use Session;

class loginconnect extends Controller
{
    public function storelogin(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:logins',
            'telNo'=>'required|max:11|unique:logins',
            'userName'=>'required|unique:logins',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password2'=>'required|same:password',
          ]);


        $login=new login;
        $login->Name = $request->name;
        $login->Email = $request->email;
        $login->telNo = $request->telNo;
        $login->userName = $request->userName;
        $login->password =Hash::make($request->password);
        $login->password2 = Hash::make($request->password2);
        $res=$login->save();
        if($res){
            return redirect('login')->with('success','You have registered successfully');
        }
        else {
            return back()->with('fail','Something Wrong');
        }
    }


    public function checklogin(Request $request){
        $this->validate($request,[
            'userName'=>'required',
            'password'=>'required',
          ]);


        $login=Login::where ('userName','=',$request->userName)->first();
        if($login){
            if(Hash::check($request->password, $login->password)){
                $request->session()->put('loginId',$login->id);
                return redirect('managedetails');
            }
            else{
                return back()->with('fail','Password is not Matches');
            }
        }
        else {
            return back()->with('fail','This User Name is not Registered');
        }
    }
    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
