<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'G',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Patient']);
        Role::create(['name' => 'Nurse']);
        Role::create(['name' => 'Company']);

        $user->assignRole('Admin');
    }
}
