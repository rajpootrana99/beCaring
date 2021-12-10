<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Company;
use App\Models\Nurse;
use App\Models\Reward;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    use GeneralTrait;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['required'],
            'address' => ['required'],
            'company_name' => ['required'],
            'company_website' => ['required'],
            'business_name' => ['required'],
            'current_cqc_rating' => ['required'],
            'your_needs' => ['required'],
            'provide_staff' => ['required'],
            'staff_type' => ['required'],
            'hours_per_week' => ['required'],
            'full_time_employees' => ['required'],
            'cqc' => ['required'],
            'insurance_proof' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->last_name,
        ]);

        $company = Company::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_website' => $request->company_website,
            'business_name' => $request->business_name,
            'contact' => $request->contact ?? 0,
            'contact_name' => $request->contact_name,
            'mobile_number' => $request->mobile_number,
            'position' => $request->position,
            'current_cqc_rating' => $request->current_cqc_rating,
            'your_needs' => $request->your_needs,
            'provide_staff' => $request->provide_staff,
            'staff_type' => $request->staff_type,
            'hours_per_week' => $request->hours_per_week,
            'full_time_employees' => $request->full_time_employees,
        ]);
        $this->storeImage($company);
        $user->assignRole('Company');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeImage($company)
    {
        $company->update([
            'cqc' => $this->imagePath('cqc', 'company', $company),
            'insurance_proof' => $this->imagePath('insurance_proof', 'company', $company),
        ]);
    }

    public function approveUser($user){
        $user = User::find($user);
        $role = $user->getRoleNames()->first();
        if ($user->is_approved == 'Not Approved'){
            $value = 1;
        }
        else{
            $value = 0;
        }
        $user->update([
            'is_approved' => $value,
        ]);
        if ($role == 'Nurse'){
            if ($value == 1){
                $nurse = Nurse::where('nurse_id', $user->id)->first();
                if ($nurse->promo_code != null){
                    $reward = Reward::where('referal_code', $nurse->promo_code)->first();
                    $points = $reward->points + 5;
                    $reward->update([
                        'points' => $points,
                    ]);
                }
            }
        }
        if ($user){
            return response()->json([
                'status' => true,
                'message' => 'Status changed successfully',
            ]);
        }
    }
}
