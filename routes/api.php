<?php

use App\Http\Controllers\api\AppointmentApiController;
use App\Http\Controllers\api\AuthApiController;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthApiController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('appointments',[AppointmentApiController::class,'index']);
    Route::post('appointments',[AppointmentApiController::class,'store']);
    Route::post('appointments/{appointment}',[AppointmentApiController::class,'edit']);
    Route::get('appointments/destory/{appointment}',[AppointmentApiController::class,'destory']);
});
