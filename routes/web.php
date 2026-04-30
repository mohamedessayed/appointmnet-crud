<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\SitePagesController;
use App\Http\Middleware\customeMiddelWare;
use Illuminate\Support\Facades\Route;



Route::get('test',function(){
    return  'actived middleware';
})->name('app');


Route::middleware('guest')->group(function () {
    Route::get('/', [SitePagesController::class, 'home'])->name('home');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('/signup', [SitePagesController::class, 'signup'])->name('signup');
    Route::post('create/account', [AuthController::class, 'signupAccount'])->name('create.account');
});





Route::middleware(['auth', customeMiddelWare::class])->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])
            ->name('appointment.index');

        Route::get('/create', [AppointmentController::class, 'create'])
            ->name('appointment.create');

        Route::post('/store', [AppointmentController::class, 'store'])
            ->name('appointment.store');

        Route::get('/edit/{appointment}', [AppointmentController::class, 'edit'])
            ->name('appointment.edit');

        Route::put('/update/{appointment}', [AppointmentController::class, 'update'])
            ->name('appointment.update');

        Route::delete('/delete/{appointment}', [AppointmentController::class, 'destroy'])
            ->name('appointment.delete');
    });


    Route::prefix('clinic')->group(function(){
        Route::get('view/{clinic}',[ClinicController::class,'show'])->name('clinic.show');

    });
});
