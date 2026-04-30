<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    //

    public $fillable = ['pateint','clinic_id','price','status'];

    public function clinic(): BelongsTo {
        return $this->BelongsTo(Clinic::class);
    }

    public function prescription() : HasOne {
        return $this->hasOne(Prescription::class);
    }
}
