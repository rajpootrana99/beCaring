<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'address',
        'address_latitude',
        'address_longitude',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
