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
            ['name' => 'Manage Nurse'],
            ['name' => 'Manage Patient'],
            ['name' => 'Manage Notification'],
            ['name' => 'Manage Appointments'],
            ['name' => 'Manage Medications'],
            ['name' => 'Manage Wish List'],

        ];
        foreach ($permissions as $permission){
            Permission::updateOrCreate(['name' => $permission['name']], $permission);
        }
        $role = Role::where('name', 'Admin')->first();
        $role->givePermissionTo(Permission::all());
        $role = Role::where('name', 'Company')->first();
        $permission = Permission::where('name', 'Manage Appointments')->get();
        $role->givePermissionTo($permission);
        $this->info('Permissions successfully created!');
    }
}
