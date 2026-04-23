<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('pages.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "pateint"=>"required|string|min:7|max:50",
            "clinic"=>"required|string|in:clinic 1,clinic 2,clinic 3",
            "price"=>"required|integer|min:1|max:500"
        ]);

        Appointment::create([

        'pateint' => $request->pateint,
        'clinic'=> $request->clinic,
        'price' => $request->price,
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
