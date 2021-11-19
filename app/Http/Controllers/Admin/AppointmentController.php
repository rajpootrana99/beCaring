<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
        $appointments = Appointment::with('nurse', 'patients')->get();
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
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'bid_price' => 'required|numeric',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $appointment = Appointment::create([
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'price' => $request->input('price'),
            'max_price' => $request->input('max_price'),
            'min_price' => $request->input('min_price'),
            'bid_price' => $request->input('bid_price'),
        ]);
        $appointment->patients()->attach($request->patient_id);
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
        $appointment = Appointment::with('patients')->where('id', $appointment)->first();
        $role = Role::where('name', 'Patient')->first();
        $patients = $role->users()->get();
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
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'bid_price' => 'required|numeric',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $appointment = Appointment::find($appointment);
        $appointment->update([
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'price' => $request->input('price'),
            'max_price' => $request->input('max_price'),
            'min_price' => $request->input('min_price'),
            'bid_price' => $request->input('bid_price'),
        ]);
        $appointment->patients()->detach();
        $appointment->patients()->attach($request->patient_id);
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
        $appointment->patients()->detach();
        $appointment->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Appointment Deleted Successfully'
        ]);
    }
}
