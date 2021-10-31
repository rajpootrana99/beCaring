<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NurseController extends Controller
{
    use GeneralTrait;
    public function login(Request $request){
        try {
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|exists:users',
                'password' => 'required|min:4'
            ]);


            if($validator->fails()){
                $message = $validator->errors();
                return response([
                    'status' => false,
                    'message' =>$message->first()
                ],401);
            }
            if(!Auth::attempt($request->only('email','password'))){
                return response([
                    'status' => false,
                    'message' => 'Invalid Password'
                ],401);
            }
            /** @var User $nurse */
            $nurse = Auth::user();
            $token = $nurse->createToken('app')->accessToken;
            return response([
                'status' => true,
                'message' => 'Success',
                'token' => $token,
                'nurse' => $nurse
            ]);

        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function nurse(){
        return Auth::user();
    }

    public function register(Request $request){
        /** @var User $nurse */
        $validator = tap(Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
        ]), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
            if (request()->phone){
                Validator::make(\request()->all(),[
                    'phone' => 'required'
                ]);
            }
        });


        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        try {
            $nurse = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone') ?? '',
                'is_nurse' => 1,
            ]);
            $this->storeImage($nurse);
            $token = $nurse->createToken('app')->accessToken;
            return response([
                'status' => true,
                'message' => 'Success',
                'token' => $token,
                'nurse' => $nurse
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    public function index(){
        try {
            $nurse = User::all();
            return response([
                'status' => 'true',
                'nurse' => $nurse
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }

    }

    public function update(Request $request, User $nurse){
        $validator = tap(Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
        ]), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
            if (request()->phone){
                Validator::make(\request()->all(),[
                    'phone' => 'required'
                ]);
            }
        });


        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        try {
            $nurse->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone') ?? '',
            ]);
            $this->storeImage($nurse);
//            $token = $nurse->createToken('app')->accessToken;
            return response([
                'status' => true,
                'message' => 'Success',
//                'token' => $token,
                'nurse' => $nurse,
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function storeImage($nurse){
        $nurse->update([
            'image' => $this->imagePath('image', 'nurse', $nurse),
        ]);
    }
}
