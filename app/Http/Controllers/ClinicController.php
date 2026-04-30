<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //

    public function show(string $clinic) {
        $clinic = Clinic::with('appointments')->find($clinic);

        return view('pages.clinic.view',compact('clinic'));
    }
}
