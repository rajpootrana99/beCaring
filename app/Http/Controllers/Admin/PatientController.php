<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $patients = User::where('is_patient', 1)->get();
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $patient = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone') ?? '',
            'is_patient' => 1,
        ]);
        $this->storeImage($patient);
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
        $patient = User::find($user);
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
            'name' => 'required',
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