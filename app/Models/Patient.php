<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'dob',
        'blood_group',
        'height',
        'weight',
        'toilet_assistance',
        'personal_care',
        'fnd_information',
        'house_work',
        'access_information',
        'care_plan',
        'allergies',
        'medications',
        'immunizations',
        'lab_results',
        'additional_notes',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
