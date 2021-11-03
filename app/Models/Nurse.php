<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_id',
        'gender',
        'dob',
        'address',
        'identification_document',
        'dbs_certificate',
        'care_qualification_certificate',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'nurse_id', 'id');
    }
}
