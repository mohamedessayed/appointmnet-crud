<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SitePagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SitePagesController::class,'home'])->name('home');



Route::prefix('appointment')->group(function(){
    Route::get('/',[AppointmentController::class,'index'])->name('appointment.index');
    Route::get('/create',[AppointmentController::class,'create'])->name('appointment.create');
    
});