<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create hotels']);
        Permission::create(['name' => 'edit hotels']);
        Permission::create(['name' => 'delete hotels']);

        Permission::create(['name' => 'create rooms']);
        Permission::create(['name' => 'edit rooms']);
        Permission::create(['name' => 'delete rooms']);

        Permission::create(['name' => 'create roomtypes']);
        Permission::create(['name' => 'edit roomtypes']);
        Permission::create(['name' => 'delete roomtypes']);

        Permission::create(['name' => 'create employees']);
        Permission::create(['name' => 'edit employees']);
        Permission::create(['name' => 'delete employees']);

        Permission::create(['name' => 'create reservations']);
        Permission::create(['name' => 'edit reservations']);
        Permission::create(['name' => 'delete reservations']);

        Permission::create(['name' => 'create reviews']);
        Permission::create(['name' => 'edit reviews']);
        Permission::create(['name' => 'delete reviews']);

        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create hotels', 'edit hotels');
        $role->givePermissionTo('create rooms', 'edit rooms');
        $role->givePermissionTo('create reservations', 'edit reservations');
        $role->givePermissionTo('create employees', 'edit employees');
        $role->givePermissionTo('create roomtypes', 'edit roomtypes');

        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo('create reviews');
        $role->givePermissionTo('delete reservations');
    }
}
