<?php

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignSuperAdminRole();
        $this->assignSupervisorRole();
        $this->assignAdminRole();
        $this->assignPaxfulRole();
        $this->assignUserRole();
        $this->assignAgentRole();
        $this->assignFullyRegisteredUserRole();
    }

    /**
     * This method assigns a Super Admin Role.
     *
     * @return void
     */
    private function assignSuperAdminRole()
    {
        $user = User::firstOrCreate([
            'username' => 'boss',
        ],[
            'username' => 'boss',
            'email' => 'boss@boss.com',
            'password' => Hash::make('secret11'),
            'phone_number' => '08094220111',
            'email_token' => Str::random(7),
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $user->update([
            'email_verified_at' => now(),
            'is_phone_no_verified' => 1,
        ]);

        $role = 'Super Admin';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }

    /**
     * This method assigns an Admin Role.
     *
     * @return void
     */
    private function assignAdminRole()
    {
        $user = User::firstOrCreate([
            'username' => 'admin',
        ],[
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret11'),
            'phone_number' => '08094220777',
            'email_token' => Str::random(7),
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $user->update([
            'email_verified_at' => now(),
            'is_phone_no_verified' => 1,
        ]);

        $role = 'Admin';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }

    /**
     * This method assigns a Supervisor Role.
     *
     * @return void
     */
    private function assignSupervisorRole()
    {
        $user = User::firstOrCreate([
            'username' => 'superagent',
        ],[
            'username' => 'superagent',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('secret11'),
            'phone_number' => '08094220772',
            'email_token' => Str::random(7),
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $user->update([
            'email_verified_at' => now(),
            'is_phone_no_verified' => 1,
        ]);

        $role = 'Supervisor';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }

    /**
     * This method assigns an Paxful Agent Role.
     *
     * @return void
     */
    private function assignPaxfulRole()
    {
        $users = factory(App\Models\User::class, 3)->create();
        foreach ($users as $user) {
            //Create the User Details
            $user->details()->save((new UserDetails()));

            $role = 'Paxful Agent';

            $assigned_role = Role::where('name', '=', $role)->firstOrFail();

            $user->assignRole($assigned_role);
        }
    }

    /**
     * This method assigns a User Role.
     *
     * @return void
     */
    private function assignUserRole()
    {
        $user = User::firstOrCreate([
            'username' => 'user',
        ],[
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('AAA7#!'),
            'phone_number' => '08094220999',
            'email_token' => Str::random(7),
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $role = 'User';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }

    /**
     * This method assigns an Operating Agent Role.
     *
     * @return void
     */
    private function assignAgentRole()
    {
        $user = User::firstOrCreate([
            'username' => 'agent',
        ],[
            'username' => 'agent',
            'email' => 'agent@agent.com',
            'password' => Hash::make('AAA7#!'),
            'phone_number' => '08094220117',
            'email_token' => Str::random(7),
            'line_manager_id' => User::whereUsername('superagent')->first()->id
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $role = 'Operating Agent';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }

    /**
     * This method assigns a fully registered user.
     *
     * @return void
     */
    private function assignFullyRegisteredUserRole()
    {
        $user = User::firstOrCreate([
            'username' => 'full',
        ],[
            'username' => 'full',
            'email' => 'full@fulls.com',
            'password' => Hash::make('AAA7#!'),
            'phone_number' => '0809992077',
            'email_token' => Str::random(7),
        ]);

        //Create the User Details
        $user->details()->save((new UserDetails()));

        $user->update([
            'email_verified_at' => now(),
            'is_phone_no_verified' => 1,
        ]);

        $role = 'User';

        $assigned_role = Role::where('name', '=', $role)->firstOrFail();

        $user->assignRole($assigned_role);
    }
}
