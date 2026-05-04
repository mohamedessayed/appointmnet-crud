<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Services\ApiResposeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppointmentApiController extends Controller
{
    //

    public function index():  JsonResponse{
        $appointments = Appointment::with('clinic')->get();

        return ApiResposeService::onSuccess(AppointmentResource::collection($appointments));
    }


    public function store(Request $request) : JsonResponse {

        $validation = Validator::make(data:$request->all(),rules:[
            "pateint"=>"required|string|min:7|max:50",
            "clinic"=>"required|string|exists:clinics,id",
            "price"=>"required|integer|min:1|max:500"
        ],attributes:[
            'price'=>'Appointment price'
        ]);

        if ($validation->fails()) {
            # code...
            return ApiResposeService::onError("data validation fail",$validation->errors());
        }

        $newAppointment = Appointment::create([

        'pateint' => $request->pateint,
        'clinic_id'=> $request->clinic,
        'price' => $request->price,
        ]);

        $newAppointment->prescription()->create([
            'explain'=> Str::random(200)
        ]);

        return ApiResposeService::onSuccess();

    }

    public function edit(Appointment $appointment, Request $request) : JsonResponse {

        $validation = Validator::make(data:$request->all(),rules:[
            "pateint"=>"required|string|min:7|max:50",
            "clinic"=>"required|string|exists:clinics,id",
            "price"=>"required|integer|min:1|max:500"
        ],attributes:[
            'price'=>'Appointment price'
        ]);

        if ($validation->fails()) {
            # code...
            return ApiResposeService::onError("data validation fail",$validation->errors());
        }

        $appointment->update([

        'pateint' => $request->pateint,
        'clinic_id'=> $request->clinic,
        'price' => $request->price,
        ]);

        return ApiResposeService::onSuccess();

    }

    public function destory(Appointment $appointment) : JsonResponse {

        $appointment->delete($appointment->id);

        return ApiResposeService::onSuccess();

    }
}
