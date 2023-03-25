<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\sdetail;
use App\Models\dailyattendance;

class searchController extends Controller
{
        public function searchdetails(){
        $search = $_GET['search'];
        $newdata= sdetail::where('Register_Number', 'Like', '%' . $search . '%')->get();
        return view('studentdetails',compact('newdata'));
}
public function searchupdate(){
    $search = $_GET['search'];
    $newdata= sdetail::where('Register_Number', 'Like', '%' . $search . '%')->get();
    return view('updatedetails',compact('newdata'));
}
public function searchdelete(){
    $search = $_GET['search'];
    $newdata= sdetail::where('Register_Number', 'Like', '%' . $search . '%')->get();
    return view('deletedetails',compact('newdata'));
}
public function searchattendance(){
    $search = $_GET['search'];
    $dailyatt= dailyattendance::where('Register_Number', 'Like', '%' . $search . '%')->get();
    return view('dailyattendance',compact('dailyatt'));
}
}
