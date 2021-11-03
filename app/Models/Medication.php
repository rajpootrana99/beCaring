<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nurse_id',
        'disease',
        'precautions',
        'medicine',
    ];

    public function patient(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }

    public function nurse(){
        return $this->belongsTo(User::class, 'nurse', 'id');
    }
}
