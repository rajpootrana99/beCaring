<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointment.index');
    }

    public function fetchAppointments(){
        $appointments = Appointment::with('nurse', 'patient')->get();
        return response()->json([
            'status' => true,
            'appointments' => $appointments,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $appointment = Appointment::create($request->all());
        if ($appointment){
            return response()->json(['status' => 1, 'message' => 'Appointment Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($appointment)
    {
        $appointment = Appointment::find($appointment);
        $patients = User::where('is_patient', 1)->get();
        if ($appointment){
            return response()->json([
                'status' => 200,
                'appointment' => $appointment,
                'patients' => $patients,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Appointment not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $appointment)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $appointment = Appointment::find($appointment);
        $appointment->update($request->all());
        if ($appointment){
            return response()->json(['status' => 1, 'message' => 'Appointment Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($appointment)
    {
        $appointment = Appointment::find($appointment);
        if (!$appointment){
            return response()->json([
                'status' => 0,
                'message' => 'Appointment not exist'
            ]);
        }
        $appointment->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Appointment Deleted Successfully'
        ]);
    }
}
