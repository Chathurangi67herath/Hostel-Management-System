<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('Student_Photo');
            $table->string('Register_Number')->unique();
            $table->string('Student_Name');
            $table->string('Home_Address');
            $table->string('Email_Address')->unique();
            $table->string('Phone_Number')->unique();
            $table->string('NIC_No')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdetails');
    }
};

