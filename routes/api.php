<?php

use App\Http\Controllers\api\AppointmentApiController;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('appointments',[AppointmentApiController::class,'index']);
Route::post('appointments',[AppointmentApiController::class,'store']);
Route::post('appointments/{appointment}',[AppointmentApiController::class,'edit']);
Route::get('appointments/destory/{appointment}',[AppointmentApiController::class,'destory']);
