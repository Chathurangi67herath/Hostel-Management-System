<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dailyattendance;

//------------------- get daily attendance---------------------------------------------

class attendanceController extends Controller
{
    public function storeattendance(Request $request){
        $dailyattendance = new dailyattendance;
        $dailyattendance->Date = $request->date;
        $dailyattendance->Register_Number = $request->registerno;
        $dailyattendance->Name = $request->studentname;
        $dailyattendance->Room_No = $request->room;
        $dailyattendance->Time_Out = $request->Tout;
        $dailyattendance->save();
        $att=dailyattendance::all();
        return view('dailyattendance')->with('dailyatt',$att);
    }


//------------------- veiw daily attendance---------------------------------------------

public function updateattendance($id){
    $dailyattendance=dailyattendance::find($id);
    return view('editdailyattendance')->with('dailyatt',$dailyattendance);
}

//------------------- get edit daily attendance---------------------------------------------
public function editstore(Request $request){
    $id=$request->id;
    $Date = $request->date;
    $Register_Number = $request->registerno;
    $Name = $request->studentname;
    $Room_No = $request->room;
    $Time_Out = $request->Tout;
    $Time_In = $request->Tin;
    $data=dailyattendance::find($id);
    $data->id=$id;
    $data->Register_Number=$Register_Number;
    $data->Name= $Name;
    $data->Room_No= $Room_No;
    $data->Time_Out=$Time_Out;
    $data->Time_In= $Time_In;
    $data->save();
    $data=dailyattendance::all();
    return redirect('dailyattendance')->with('dailyatt',$data);

 }

 //------------------- is in or not in button---------------------------------------------

 public function isinmethod($id){
    $dailyattendance = dailyattendance::find($id);
    $dailyattendance->IsInOrOut=1;
    $dailyattendance->save();
    return redirect('dailyattendance');
 }

 public function isnotmethod($id){
    $dailyattendance = dailyattendance::find($id);
    $dailyattendance->IsInOrOut=0;
    $dailyattendance->save();
    return redirect('dailyattendance');
 }

}
