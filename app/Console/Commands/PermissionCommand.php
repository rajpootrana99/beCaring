<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'define:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Permissions';

    public function handle()
    {
        $permissions = [
            ['name' => 'Manage Company'],
            ['name' => 'Manage Nurse'],
            ['name' => 'Manage Patient'],
            ['name' => 'Manage Notification'],
            ['name' => 'Manage Appointments'],
            ['name' => 'Manage Medications'],
            ['name' => 'Manage Wish List'],
            ['name' => 'Manage Role'],
            ['name' => 'Manage Training'],
            ['name' => 'Manage Employee'],
            ['name' => 'Manage Help'],
            ['name' => 'Manage Feedback'],
            ['name' => 'Manage Chat'],
            ['name' => 'Show Company'],
            ['name' => 'Show Nurse'],
            ['name' => 'Show Patient'],
            ['name' => 'Show Notification'],
            ['name' => 'Show Appointments'],
            ['name' => 'Show Medications'],
            ['name' => 'Show Wish List'],
            ['name' => 'Show Role'],
            ['name' => 'Show Training'],
            ['name' => 'Show Employee'],
            ['name' => 'Show Help'],
            ['name' => 'Show Feedback'],

        ];
        foreach ($permissions as $permission){
            Permission::updateOrCreate(['name' => $permission['name']], $permission);
        }
        $role = Role::where('name', 'Admin')->first();
        $role->givePermissionTo(Permission::all());
        $role = Role::where('name', 'Company')->first();
        $permission = Permission::where('name', 'Manage Appointments')->get();
        $role->givePermissionTo($permission);
        $permission = Permission::where('name', 'Show Appointments')->get();
        $role->givePermissionTo($permission);
        $permission = Permission::where('name', 'Show Patient')->get();
        $role->givePermissionTo($permission);
        $this->info('Permissions successfully created!');
    }
}
