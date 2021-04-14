<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Admin
        $name = 'Super Admin';
        $role = new Role();
        $role->name = $name;

        //Grant all access and Administer roles & permissions
        $permissions = ['All Access', 'Administer roles & permissions'];

        $role->save();

        foreach ($permissions as $permission) {
            $permit = Permission::where('name', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($permit);
        }

        //Admin
        $name = 'Admin';
        $role = new Role();
        $role->name = $name;

        //Only Administer roles & permissions
        $permissions = ['Administer roles & permissions'];

        $role->save();

        foreach ($permissions as $permission) {
            $permit = Permission::where('name', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($permit);
        }

        //Paxful Agent
        $name = 'Paxful Agent';
        $role = new Role();
        $role->name = $name;

        //Only grant user permission
        $permissions = ['Read Only'];

        $role->save();

        foreach ($permissions as $permission) {
            $permit = Permission::where('name', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($permit);
        }

        //User
        $name = 'User';
        $role = new Role();
        $role->name = $name;

        //Only grant user permission
        $permissions = ['Read Only'];

        $role->save();

        foreach ($permissions as $permission) {
            $permit = Permission::where('name', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($permit);
        }
    }
}
