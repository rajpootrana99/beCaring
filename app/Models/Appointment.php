<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nurse_id',
        'date',
        'time',
        'status',
    ];

    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute] ?? 0;
    }

    public function statusOptions(){
        return [
            2 => 'Reject',
            1 => 'Booked',
            0 => 'pending',
        ];
    }

    public function patient(){
        return $this->hasOne(User::class, 'id', 'patient_id');
    }

    public function nurse(){
        return $this->hasOne(User::class, 'id', 'nurse_id');
    }

}
