<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'apitent_name'=> $this->pateint,
            'price'=>$this->price." EGP",
            'status'=>$this->status,
            'id'=>$this->id,
            'clinic'=> new ClinicResource($this->clinic),
        ];
    }
}
