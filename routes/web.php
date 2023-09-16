<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\connectController;
use App\Http\Controllers\addnewController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\updateController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\loginconnect;
use App\Http\Controllers\searchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//==================================================
//                  Navigate
//==================================================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[connectController::class,'veiwlogin'])->middleware('alreadyLoggedIn');

Route::get('/signup',[connectController::class,'veiwsignup']);

Route::get('/managedetails',[connectController::class,'veiwmanagedetails'])->middleware('isLoggedIn');

Route::get('/studentdetails',[connectController::class,'veiwstudentdetails']);

Route::get('/dailyattendance',[connectController::class,'veiwdailyattendance']);

Route::get('/addnewdailyattendance',[connectController::class,'veiwaddnewdailyattendance']);

Route::get('/addnewstudent',[connectController::class,'veiwaddnewstudent']);

Route::get('/updatedetails',[connectController::class,'veiwupdatedetails']);

Route::get('/deletedetails',[connectController::class,'veiwdeletedetails']);

Route::get('/editupdatedetails',[connectController::class,'veiweditupdatedetails']);

Route::get('/editdailyattendance',[connectController::class,'veiweditdailyattendance']);

//------------------------- student details ------------------------------------------------------------------------------------------------

//==========================================================
//             Data Sending database
//==========================================================

Route::post('/saveDetails',[addnewController::class,'storedata'])->name('saveDetails');

//==========================================================
//             Data Sending to web
//==========================================================

Route::get('/studentdetails',function(){
    $sdata=App\models\sdetail::all();
    return view('studentdetails')->with('newdata',$sdata);
});

//==========================================================
//             Data delete
//==========================================================

Route::get('/deletedetails',function(){
    $sdata=App\models\sdetail::all();
    return view('deletedetails')->with('newdata',$sdata);
});

route::get('/dedetails/{id}',[deleteController::class,'delete']);

//==========================================================
//             Details update
//==========================================================

Route::get('/updatedetails',function(){
    $sdata=App\models\sdetail::all();
    return view('updatedetails')->with('newdata',$sdata);
});

route::get('/updetails/{id}',[updateController::class,'update']);

route::get('/deletephoto/{id}',[updateController::class,'deletephoto']);
//==========================================================
//             Edit Data Sending database
//==========================================================

 Route::post('/saveeditdetails',[updateController::class,'storeeditdata']);


//--------------------------Daily Attendance---------------------------------------------------------------------------------------------

//==========================================================
//             Attendance Data Sending database
//==========================================================

Route::post('/savedailyattendance',[attendanceController::class,'storeattendance']);

//==========================================================
//            Attendance Data Sending to web
//==========================================================

Route::get('/dailyattendance',function(){
    $att=App\models\dailyattendance::all();
    return view('dailyattendance')->with('dailyatt',$att);
});

//==========================================================
//           Update Attendance
//==========================================================

route::get('/upatt/{id}',[attendanceController::class,'updateattendance']);

//==========================================================
//             Edit attendance Sending database
//==========================================================

Route::post('/editatt',[attendanceController::class,'editstore']);

//==========================================================
//             is in or not in button
//==========================================================

route::get('/isin/{id}',[attendanceController::class,'isinmethod']);

route::get('/isnotin/{id}',[attendanceController::class,'isnotmethod']);

//------------------------- login details ------------------------------------------------------------------------------------------------

//==========================================================
//             singup Data Sending database
//==========================================================

Route::post('/savelogin',[loginconnect::class,'storelogin'])->name('savelogin');

//==========================================================
//             logging Data
//==========================================================

Route::post('/checklogin',[loginconnect::class,'checklogin'])->name('checklogin');

//==========================================================
//             log out
//==========================================================

Route::get('/logout',[loginconnect::class,'logout']);

//==========================================================
//             search bar
//==========================================================

Route::get('/searchdetails',[searchController::class,'searchdetails']);

Route::get('/searchupdate',[searchController::class,'searchupdate']);

Route::get('/searchdelete',[searchController::class,'searchdelete']);

Route::get('/searchattendance',[searchController::class,'searchattendance']);
