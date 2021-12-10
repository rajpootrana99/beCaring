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
        $appointments = Appointment::select('id','start_date','min_price','time')->where('status',0)->distinct()->get();
        return response()->json($appointments);
    }

    public function fetchBookings(){
        $bookings = Appointment::where([
            'nurse_id' => Auth::id(),
            'status' => 1,
            'is_complete' => 0,
        ])->get();
        return response([
            'status' => true,
            'bookings' => $bookings,
        ]);
    }

    public function getBidAmount(){

    }

    public function bookAppointment(Request $request){
        $validator = Validator::make($request->all(),[
            'appointment_id' => 'required',
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
            'status' => 1,
        ]);

        $appointment = Appointment::with('patients', 'nurse')->where('id', $appointment->id)->first();

        return response([
            'status' => true,
            'appointment' => $appointment,
        ]);
    }

    public function fetchPastBookings(){
        $bookings = Appointment::where([
            'nurse_id' => Auth::id(),
            'status' => 1,
            'is_complete' => 1,
        ])->get();
        return response([
            'status' => true,
            'bookings' => $bookings,
        ]);
    }

    public function completeAppointment(Request $request){
        $validator = Validator::make($request->all(),[
            'appointment_id' => 'required',
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
            'is_complete' => 1,
        ]);

        return response([
            'status' => true,
            'appointment' => $appointment,
        ]);
    }
}
