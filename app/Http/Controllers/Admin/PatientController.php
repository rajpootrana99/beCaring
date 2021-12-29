<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() == 1){
            $patients = User::role('Patient')->get();
            dd($patients);
        }
        else {
            $patients = User::role('Patient')->where('parent_id', Auth::id())->get();
            dd($patients);
        }
        return view('patient.index', [
            'patients' => $patients,
        ]);
    }

    public function fetchPatients(){
        $patients = Patient::with('user')->get();
        return response()->json([
            'status' => true,
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email|unique:users',
            'address' => 'required',
            'dob' => 'required',
            'blood_group' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'parent_id' => 'required'
        ]);
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patient = User::create([
            'name' => $first_name.' '.$last_name,
            'email' => $request->input('email') ?? '',
            'password' => Hash::make('password'),
            'phone' => $request->input('phone') ?? '',
            'parent_id' => $request->input('parent_id'),
            'address' => $request->input('address'),
            'address_latitude' => $request->input('address_latitude'),
            'address_longitude' => $request->input('address_longitude'),
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
        return redirect(route('patient.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $patient = Patient::find($user);
        return view('patient.edit',[
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email|exists:users',
            'address' => 'required',
            'dob' => 'required',
            'blood_group' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'parent_id' => 'required',
            'allergies' => 'nullable',
            'medications' => 'nullable',
            'immunizations' => 'nullable',
            'lab_results' => 'nullable',
            'additional_notes' => 'nullable',
        ]);
        $user = User::find($patient->patient_id);
        $user->update($request->all());
        $this->storeImage($user);
        $patient->update([
            'patient_id' => $user->id,
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
        return redirect(route('patient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($patient)
    {
        $patient = Patient::find($patient);
        $user = User::find($patient->patient_id);
        $appointment = Appointment::where('patient_id', $patient->id)->get();
        if (count($appointment)>0){
            return response()->json([
                'status' => 0,
                'message' => 'Appointment Exist against this Patient',
            ]);
        }
        else{
            $patient->delete();
            $user->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Patient Deleted Successfully',
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
