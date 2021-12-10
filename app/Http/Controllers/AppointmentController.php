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
            'appointment_id' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }
        $appointment = Appointment::with('patient.user')->where('id', $request->appointment_id)->get();
        return response()->json($appointment);
    }

    public function fetchBookings(){
        $nurse = Nurse::where('nurse_id', Auth::id())->first();
        $nurse_id = $nurse->id;
        $bookings = Appointment::whereHas('nurses', function($query) use($nurse_id) {
            $query->where('nurses.id', $nurse_id);
        })->where('status', 1)->get();
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
        $nurse = Nurse::where('nurse_id', Auth::id())->first();
        $appointment = Appointment::where([
            'patient_id' => $request->patient_id,
            'status' => 0,
        ])->get();
        for ($count=0; $count < count($appointment); $count++){
            $appointment[$count]->update([
                'status' => 1,
            ]);
            $appointment[$count]->nurses()->attach($nurse->id);
        }

        return response()->json([
            'status' => true,
            'message' => 'Appointment Booked'
        ]);
    }

    public function fetchPastBookings(){
        $nurse = Nurse::where('nurse_id', Auth::id())->first();
        $nurse_id = $nurse->id;
        $bookings = Appointment::whereHas('nurses', function($query) use($nurse_id) {
            $query->where('nurses.id', $nurse_id);
        })->where('status', 4)->get();
        return response()->json($bookings);
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
            'status' => 4,
        ]);

        return response([
            'status' => true,
            'appointment' => 'Appointment Completed Successfully',
        ]);
    }
}
