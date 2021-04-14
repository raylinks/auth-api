<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['All Access', 'Administer roles & permissions', 'Read Only'];
        foreach ($names as $name) {
            $permission = new Permission();
            $permission->name = $name;
            $permission->save();
        }
    }
}
