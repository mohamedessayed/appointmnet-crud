<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    //
    protected $fillable = ['explain', 'appointment_id'];

    public function appointment() : BelongsTo {

    return $this->belongsTo(Appointment::class);
        
    }


}
