<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sdetail;
use File;

class deleteController extends Controller
{
     public function delete($id){

        $sdetail=sdetail::findOrFail($id);
        if(File::exists("Student_Photo/".$sdetail->Student_Photo)){
            File::delete("Student_Photo/".$sdetail->Student_Photo);
        }
        $sdetail->delete();
        return redirect('deletedetails');
     }
}
