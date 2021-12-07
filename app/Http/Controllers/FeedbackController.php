<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function sendFeedback(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'email|required',
            'comments' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        try {
            $feedback = Feedback::create($request->all());
            if ($feedback){
                return response([
                    'status' => true,
                    'message' => 'Feedback Send Successfully',
                ]);
            }
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
