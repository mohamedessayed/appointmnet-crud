<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //

        

        $appointments = Appointment::latest()->paginate(2);

        return view('pages.appointment.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        //
        $clinics = Clinic::all();
        return view('pages.appointment.create',compact('clinics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "pateint"=>"required|string|min:7|max:50",
            "clinic"=>"required|string|exists:clinics,id",
            "price"=>"required|integer|min:1|max:500"
        ]);

        $newAppointment = Appointment::create([

        'pateint' => $request->pateint,
        'clinic_id'=> $request->clinic,
        'price' => $request->price,
        ]);

        $newAppointment->prescription()->create([
            'explain'=> Str::random(200)
        ]);


        return redirect()->route('appointment.index')->with('success', "operation complated successfully!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //

        return view('pages.appointment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //

        $request->validate([
            "pateint"=>"required|string|min:7|max:50",
            "clinic"=>"required|string|exists:clinics,id",
            "price"=>"required|integer|min:1|max:500"
        ]);

        $appointment->update([

        'pateint' => $request->pateint,
        'clinic'=> $request->clinic,
        'price' => $request->price,
        ]);


        return redirect()->route('appointment.index')->with('success', "operation complated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete($appointment->id);

        return redirect()->route('appointment.index')->with('success', "operation complated successfully!");

    }
}
