<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    public function markVideoComplete(Request $request){
        $validator = Validator::make($request->all(),[
            'training_id' => 'required',
        ]);


        if($validator->fails()){
            $message = $validator->errors();
            return response([
                'status' => false,
                'message' =>$message->first()
            ],401);
        }

        $training = Training::find($request->training_id);
        $training->nurses()->attach(Auth::id());

        $training = User::with('trainings')->where('id', Auth::id())->first();

        return response([
            'status' => true,
            'training' => $training,
        ]);
    }
}
