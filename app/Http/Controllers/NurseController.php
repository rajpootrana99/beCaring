<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\Nurse;
use App\Models\Reward;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
//            $nurse = Auth::user();
            if (Auth::user()->getRoleNames()->first() == 'Nurse'){
                $nurse = Auth::user();
                $token = $nurse->createToken('app')->accessToken;
                return response([
                    'status' => true,
                    'message' => 'Success',
                    'token' => $token,
                    'nurse' => $nurse
                ]);
            }
            else {
                return response([
                    'status' => false,
                    'message' => 'Invalid User',
                    'role' => Auth::user()->getRoleNames()->first(),
                ]);
            }


        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function nurse(){
        $nurse =  User::where('id', Auth::id())->get();
        return response()->json($nurse);
    }

    public function register(Request $request){
        /** @var User $nurse */
        $validator = tap(Validator::make($request->all(),[
            'token' => 'required',
            'device_token' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'dob' => 'required',
            'working_radius' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
        ]), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->identification_document)){
                Validator::make(request()->all(),[
                    'identification_document' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->dbs_certificate)){
                Validator::make(request()->all(),[
                    'dbs_certificate' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->care_qualification_certificate)){
                Validator::make(request()->all(),[
                    'care_qualification_certificate' => 'required|file|image',
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
            $token = $request->input('token');
            if(!$verifyEmail = DB::table('verify_emails')->where('token', $token)->first()){
                return response([
                    'status' => false,
                    'message' => 'Invalid token!'
                ], 400);
            }
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $nurse = User::create([
                'name' => $first_name.' '.$last_name,
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
            $nurse->assignRole('Nurse');
//            $this->storeImage($nurse);
            $device_token = Token::create([
                'nurse_id' => $nurse->id,
                'token' => $request->input('device_token'),
            ]);
            $nurse_detail = Nurse::create([
                'nurse_id' => $nurse->id,
                'working_radius' => $request->input('working_radius'),
                'postal_code' => $request->input('postal_code'),
                'promo_code' => $request->input('promo_code'),
                'dob' => $request->input('dob'),
            ]);
            $this->storeDocument($nurse_detail);
            $referal_code = $this->generateRandomString(9);
            $reward = Reward::create([
                'nurse_id' => $nurse->id,
                'referal_code' => $referal_code,
            ]);
            $token = $nurse->createToken('app')->accessToken;
            return response([
                'status' => true,
                'message' => 'Success',
                'token' => $token,
                'nurse' => $nurse,
                'device_token' => $device_token,
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

    public function update(Request $request, $nurse){
        $validator = Validator::make($request->all(),[
            'working_radius' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        $nurse = User::find($nurse);
        try {
            $nurse->update([
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ]);
            $nurse_detail = Nurse::where('nurse_id', $nurse->id)->first();
            $nurse_detail->update([
                'working_radius' => $request->input('working_radius'),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Nurse Detail Updated Successfully'
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function completeProfile(Request $request){
        $validator = tap(Validator::make($request->all()), function (){
            if(request()->hasFile(request()->image)){
                Validator::make(request()->all(),[
                    'image' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->identification_document)){
                Validator::make(request()->all(),[
                    'identification_document' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->dbs_certificate)){
                Validator::make(request()->all(),[
                    'dbs_certificate' => 'required|file|image',
                ]);
            }
            if(request()->hasFile(request()->care_qualification_certificate)){
                Validator::make(request()->all(),[
                    'care_qualification_certificate' => 'required|file|image',
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
            $nurse = Nurse::where('id', Auth::id() )->first();
            $user = User::where('id', $nurse->nurse_id)->first();
            $this->storeImage($user);
            $this->storeDocument($nurse);
            return response([
                'status' => true,
                'message' => 'Success',
                'nurse' => $nurse,
                'user' => $user,
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

    public function storeDocument($nurse_detail){
        $nurse_detail->update([
            'identification_document' => $this->imagePath('identification_document', 'nurse', $nurse_detail),
            'dbs_certificate' => $this->imagePath('dbs_certificate', 'nurse', $nurse_detail),
            'care_qualification_certificate' => $this->imagePath('care_qualification_certificate', 'nurse', $nurse_detail),
        ]);
    }

    public function verifyEmail(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        $token = random_int(1000, 9999);

        $email = $request->input('email');

        try {
            DB::table('verify_emails')->insert([
                'email' => $request->input('email'),
                'token' => $token
            ]);

            Mail::send('Mails.verify', ['token' => $token], function (Message $message) use ($email){
                $message->to($email);
                $message->subject('Verify Your Email');
            });

            return response([
                'status' => true,
                'message' => 'Check your email'
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function verifyToken(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'token' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        $token = $request->input('token');
        $verify = DB::table('verify_emails')->where('email', $request->email)->orderBy('id', 'desc')->first();
        if($verify->token == $token){
            return response([
                'status' => true,
                'message' => 'Success',
            ], 200);
        }
        else{
            return response([
                'status' => false,
                'message' => 'Invalid Token!'
            ]);
        }
    }

    public function setInterviewDate(Request $request){
        $validator = Validator::make($request->all(),[
            'date_of_interview' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }

        $nurse = Nurse::where('nurse_id', Auth::id())->first();
        $nurse->update($request->all());
        if ($nurse){
            return response([
                'status' => true,
                'message' => 'Interview Date Set Successfully',
            ]);
        }
    }

    public function fetchReward(){
        $reward = Reward::where('nurse_id', Auth::id())->get();
        if ($reward){
            return response()->json($reward);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'No Promo Code Exist'
            ]);
        }
    }

    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
