<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Address;
use App\Models\User;
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
        return view('patient.index');
    }

    public function fetchPatients(){
        $role = Role::where('name', 'Patient')->first();
        $patients = $role->users()->get();
        return response()->json([
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
            'address' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $patient = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone') ?? '',
        ]);
        $patient->assignRole('Patient');
        $this->storeImage($patient);
        $patient = Address::create([
            'patient_id' => $patient->id,
            'address' => $request->input('address'),
            'address_latitude' => $request->input('address_latitude'),
            'address_longitude' => $request->input('address_longitude'),
        ]);
        if ($patient){
            return response()->json(['status' => 1, 'message' => 'Patient Added Successfully']);
        }
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
        $patient = User::with('address')->where('id', $user)->first();
        if ($patient){
            return response()->json([
                'status' => 200,
                'patient' => $patient,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Patient not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|exists:users',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $patient = User::find($user);
        $patient->update($request->all());
        $this->storeImage($patient);
        if ($patient){
            return response()->json(['status' => 1, 'message' => 'Patient Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $patient = User::find($user);
        if (!$patient){
            return response()->json([
                'status' => 0,
                'message' => 'Patient not exist'
            ]);
        }
        $patient->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Patient Deleted Successfully'
        ]);
    }

    public function storeImage($patient)
    {
        $patient->update([
            'image' => $this->imagePath('image', 'patient', $patient),
        ]);
    }
}
