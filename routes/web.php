<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SitePagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SitePagesController::class,'home'])->name('home');



Route::prefix('appointment')->group(function(){
    Route::get('/',[AppointmentController::class,'index'])->name('appointment.index');
    Route::get('/create',[AppointmentController::class,'create'])->name('appointment.create');
    Route::post('/store',[AppointmentController::class,'store'])->name('appointment.store');
    Route::get('/edit/{appointment}',[AppointmentController::class,'edit'])->name('appointment.edit');
    Route::put('/update/{appointment}',[AppointmentController::class,'update'])->name('appointment.update');
    Route::delete('/delete/{appointment}',[AppointmentController::class,'destroy'])->name('appointment.delete');
    
});