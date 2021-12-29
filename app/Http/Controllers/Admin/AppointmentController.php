<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AppointmentController extends Controller
{
    use GeneralTrait;
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
        if (Auth::id() == 1){
            $appointments = Appointment::with('patient','nurses.user','company')->get();
        }
        else {
            $appointments = Appointment::with('patient','nurses.user','company')->where('company_id', Auth::id())->get();
        }
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
        $appointment = Appointment::latest()->orderBy('id', 'desc')->first();
        if (Auth::user()->company_id == null){
            $company_id = Auth::id();
        }
        else{
            $company_id = Auth::user()->parent_id;
        }
        if($appointment){
            $visit_id = $appointment->id;
        }
        else{
            $visit_id = 0;
        }
        return response()->json([
            'status' => true,
            'visit_id' => $visit_id+1,
            'company_id' => $company_id,
        ]);
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
            'company_id' => 'required',
            'start_date' => 'required',
            'day' => 'required',
            'time' => 'required',
            'specific_time' => 'nullable',
            'visit_duration' => 'required',
            'no_of_carers' => 'required',
            'hoist_required' => 'required',
            'visit_information' => 'nullable',
            'max_hourly_rate' => 'required',
            'min_hourly_rate' => 'required',
            'bid_hourly_rate' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $day = $request->input('day');
        for ($count=0; $count < count($day); $count++){
            $appointment = Appointment::create([
                'patient_id' => $request->input('patient_id'),
                'company_id' => $request->input('company_id'),
                'start_date' => $request->input('start_date'),
                'day' => $day[$count],
                'repeat' => $request->input('repeat') ?? 0,
                'time' => $request->input('time'),
                'specific_time' => $request->input('specific_time'),
                'visit_duration' => $request->input('visit_duration'),
                'no_of_carers' => $request->input('no_of_carers'),
                'hoist_required' => $request->input('hoist_required'),
                'visit_information' => $request->input('visit_information'),
                'max_hourly_rate' => $request->input('max_hourly_rate'),
                'min_hourly_rate' => $request->input('min_hourly_rate'),
                'bid_hourly_rate' => $request->input('bid_hourly_rate'),
            ]);
        }
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
        $appointment = Appointment::with('patient')->where('id', $appointment)->first();
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
        $appointment = Appointment::where([
            'patient_id' => $appointment->patient_id,
            'status' => 0
        ])->get();
        if (!$appointment){
            return response()->json([
                'status' => 0,
                'message' => 'Appointment not exist'
            ]);
        }
        for ($count=0; $count<count($appointment); $count++){
            $appointment[$count]->nurses()->detach();
            $appointment[$count]->delete();
        }
        return response()->json([
            'status' => 1,
            'message' => 'Appointment Deleted Successfully'
        ]);
    }

    public function createPatient(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email|unique:users',
            'address' => 'required',
            'dob' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patient = User::create([
            'name' => $first_name.' '.$last_name,
            'email' => $request->input('email') ?? '',
            'password' => Hash::make('password'),
            'phone' => $request->input('phone') ?? '',
            'address' => $request->input('address'),
            'parent_id' => $request->input('parent_id'),
        ]);
        $patient->assignRole('Patient');
        $this->storeImage($patient);
        $patient_detail = Patient::create([
            'patient_id' => $patient->id,
            'dob' => $request->input('dob'),
            'blood_group' => $request->input('blood_group') ?? '',
            'height' => $request->input('height') ?? '',
            'weight' => $request->input('weight') ?? '',
            'toilet_assistance' => $request->input('toilet_assistance') ?? '',
            'personal_care' => $request->input('personal_care') ?? '',
            'fnd_information' => $request->input('fnd_information') ?? '',
            'house_work' => $request->input('house_work') ?? '',
            'access_information' => $request->input('access_information') ?? '',
            'allergies' => $request->input('allergies') ?? '',
            'medications' => $request->input('medications') ?? '',
            'immunizations' => $request->input('immunizations') ?? '',
            'lab_results' => $request->input('lab_results') ?? '',
            'additional_notes' => $request->input('additional_notes') ?? '',
        ]);
        if ($patient){
            return response()->json([
                'status' => 1,
                'message' => 'Patient Created Successfully'
            ]);
        }
    }

    public function storeImage($patient)
    {
        $patient->update([
            'care_plan' => $this->imagePath('care_plan', 'patient', $patient),
        ]);
    }
}
