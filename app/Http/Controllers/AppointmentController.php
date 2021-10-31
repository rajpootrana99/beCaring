<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function fetchAppointments(){
        $appointments = Appointment::where('satatus',0)->get();
        return response([
            'status' => true,
            'appointments' => $appointments,
        ]);
    }

    public function fetchBookings(){
        $bookings = Appointment::where([
            'nurse_id' => Auth::id(),
            'status' => 1
        ])->get();
        return response([
            'status' => true,
            'bookings' => $bookings,
        ]);
    }

    public function bookAppointment(Request $request){
        $validator = Validator::make($request->all(),[
            'appointment_id' => 'required',
            'rate' => 'required'
        ]);


        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }

        $appointment = Appointment::find($request->appointment_id);
        $appointment->update([
            'nurse_id' => Auth::id(),
            'rate' => $request->input('rate'),
            'status' => 1,
        ]);

        return response([
            'status' => true,
            'appointment' => $appointment,
        ]);
    }
}
