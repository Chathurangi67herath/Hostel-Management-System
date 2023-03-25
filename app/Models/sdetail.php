<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sdetail extends Model
{
    use HasFactory;
    protected $fillable =[
        'Student_Photo',
        'Register_Number',
        'Student_Name',
        'Home_Address',
        'Email_Address',
        'Phone_Number',
        'NIC_No',
    ];
}
