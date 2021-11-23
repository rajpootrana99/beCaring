<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_id',
        'dob',
        'working_radius',
        'postal_code',
        'date_of_interview',
        'identification_document',
        'dbs_certificate',
        'care_qualification_certificate',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'nurse_id');
    }
}
