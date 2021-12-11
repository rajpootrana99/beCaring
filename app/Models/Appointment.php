<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'company_id',
        'start_date',
        'day',
        'repeat',
        'time',
        'specific_time',
        'visit_duration',
        'no_of_carers',
        'hoist_required',
        'visit_information',
        'max_hourly_rate',
        'min_hourly_rate',
        'bid_hourly_rate',
        'status',
    ];

    public function getDayAttribute($attribute){
        return $this->dayOptions()[$attribute] ?? 0;
    }

    public function dayOptions(){
        return [
            6 => 'Sunday',
            5 => 'Saturday',
            4 => 'Friday',
            3 => 'Thursday',
            2 => 'Wednesday',
            1 => 'Tuesday',
            0 => 'Monday',
        ];
    }

    public function getRepeatAttribute($attribute){
        return $this->repeatOptions()[$attribute] ?? 0;
    }

    public function repeatOptions(){
        return [
            1 => 'Repeat Every Week',
            0 => 'No Repeat',
        ];
    }

    public function getTimeAttribute($attribute){
        return $this->timeOptions()[$attribute] ?? 0;
    }

    public function timeOptions(){
        return [
            4 => 'Specific Time',
            3 => 'Bed Time',
            2 => 'Dinner',
            1 => 'Lunch',
            0 => 'Wake Up',
        ];
    }

    public function getVisitDurationAttribute($attribute){
        return $this->visitDurationOptions()[$attribute] ?? 0;
    }

    public function visitDurationOptions(){
        return [
            2 => '60 min',
            1 => '45 min',
            0 => '30 min',
        ];
    }

    public function getHoistRequiredAttribute($attribute){
        return $this->hoistRequiredOptions()[$attribute] ?? 0;
    }

    public function hoistRequiredOptions(){
        return [
            1 => 'Yes',
            0 => 'No',
        ];
    }

    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute] ?? 0;
    }

    public function statusOptions(){
        return [
            4 => 'Expire',
            3 => 'Complete',
            2 => 'Reject',
            1 => 'Booked',
            0 => 'Pending',
        ];
    }

    public function nurses(){
        return $this->belongsToMany(Nurse::class, 'appointment_nurse', 'appointment_id', 'nurse_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function company(){
        return $this->belongsTo(User::class, 'company_id', 'id');
    }

}
