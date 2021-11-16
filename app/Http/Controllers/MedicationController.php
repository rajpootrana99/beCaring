<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class MedicationController extends Controller
{
    public function fetchPatients(){
        $role = Role::where('name', 'Patient')->first();
        $patients = $role->users()->get();
        return response([
            'status' => true,
            'patients' => $patients,
        ]);
    }

    public function fetchNurseMedication(){
        $medications = Medication::with('patient')->where('nurse_id', Auth::id())->get();
        return response([
            'status' => true,
            'medications' => $medications,
        ]);
    }

    public function fetchPatientMedication(){
        $medications = Medication::with('nurse')->where('patient_id', Auth::id())->get();
        return response([
            'status' => true,
            'medications' => $medications,
        ]);
    }

    public function createMedication(Request $request){
        $validator = Validator::make($request->all(),[
            'patient_id' => 'required',
            'disease' => 'required',
            'precautions' => 'required',
            'medicine' => 'required',
        ]);


        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }

        $medication = Medication::create([
            'patient_id' => $request->input('patient_id'),
            'nurse_id' => Auth::id(),
            'disease' => $request->input('disease'),
            'precautions' => $request->input('precautions'),
            'medicine' => $request->input('medicine'),
        ]);

        return response([
            'status' => true,
            'medication' => $medication,
        ]);
    }
}
