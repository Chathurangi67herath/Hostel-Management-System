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
        Schema::create('dailyattendances', function (Blueprint $table) {

            $table->increments('id');
            $table->date('Date');
            $table->string('Register_Number');
            $table->string('Name');
            $table->integer('Room_No');
            $table->time('Time_Out')->default(0);;
            $table->time('Time_In')->default(0);;
            $table->boolean('IsInOrOut')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailyattendances');
    }
};
