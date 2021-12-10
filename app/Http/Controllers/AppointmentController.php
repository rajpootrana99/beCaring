<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder;

class AppointmentController extends Controller
{
    public function fetchAppointments(){
        $appointments = Appointment::with('patient.user')->select('patient_id','start_date','min_hourly_rate','time','visit_duration')->where('status',0)->distinct()->get();
        return response()->json($appointments);
    }

    public function fetchAppointmentDetails(Request $request){
        $validator = Validator::make($request->all(),[
            'patient_id' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }
        $appointments = Appointment::where([
            'patient_id' => $request->patient_id,
            'status' => '1'])->get();
    }

    public function fetchBookings(){
        $nurse = Nurse::where('nurse_id', Auth::id())->first();
        $nurse_id = $nurse->id;
        $bookings = Appointment::whereHas('nurses', function($query) use($nurse_id) {
            $query->where('nurses.id', $nurse_id);
        })->get();
        return response()->json($bookings);
    }

    public function getBidAmount(){

    }

    public function bookAppointment(Request $request){
        $validator = Validator::make($request->all(),[
            'patient_id' => 'required',
        ]);


        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }

        $appointment = Appointment::where([
            'patient_id' => $request->patient_id,
            'status' => 0,
        ])->get();
        for ($count=0; $count < count($appointment); $count++){
            $appointment[$count]->update([
                'nurse_id' => Auth::id(),
                'status' => 1,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Appointment Booked'
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
