<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patientDetail(Request $request){
        $patient = Patient::with('user')->where('id', $request->id)->first();
        return response()->json([
            'status' => true,
            'patient' => $patient,
        ]);
    }
}
