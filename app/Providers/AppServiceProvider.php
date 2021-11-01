<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $nurses = User::where('is_nurse', 1)->get();
        $patients = User::where('is_patient', 1)->get();
        $appointments = Appointment::all();
        View::share([
            'nurses' => $nurses,
            'patients' => $patients,
            'appointments' => $appointments,
        ]);
    }
}
