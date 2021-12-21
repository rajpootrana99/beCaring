<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'appointment_id',
        'earning',
        'date',
        'status',
    ];

    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute] ?? 0;
    }

    public function statusOptions(){
        return [
            2 => 'Reject',
            1 => 'Approved',
            0 => 'Pending',
        ];
    }

    public function nurse(){
        return $this->belongsTo(Nurse::class);
    }

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
}
