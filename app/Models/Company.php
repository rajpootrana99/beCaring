<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'business_name',
        'contact',
        'name',
        'mobile_number',
        'position',
        'current_cqc_rating',
        'your_needs',
        'provide_staff',
        'staff_type',
        'hours_per_week',
        'full_time_employees',
        'cqc',
        'insurance_proof',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
