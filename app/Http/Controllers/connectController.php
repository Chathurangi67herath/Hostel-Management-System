<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\login;
use Hash;
use Session;

class connectController extends Controller
{
    public function veiwlogin(){
        return view('login');
    }
    public function veiwsignup(){
        return view('signup');
    }
    public function veiwmanagedetails(){
        $data = array();
        if(Session::has('loginId')){
            $data = Login::where('id','=',Session::get('loginId'))->first();
        }
        return view('managedetails',compact('data'));
    }
    public function veiwstudentdetails(){
        return view('studentdetails');
    }
    public function veiwdailyattendance(){
        return view('dailyattendance');
    }
    public function veiwaddnewdailyattendance(){
        return view('addnewdailyattendance');
    }
    public function veiwaddnewstudent(){
        return view('addnewstudent');
    }
    public function veiwupdatedetails(){
        return view('updatedetails');
    }
    public function veiwdeletedetails(){
        return view('deletedetails');
    }
    public function veiweditupdatedetails(){
        return view('editupdatedetails');
    }
    public function veiweditdailyattendance(){
        return view('editdailyattendance');
    }

}
