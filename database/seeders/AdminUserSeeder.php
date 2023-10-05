<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Sentinel;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $admin = Sentinel::registerAndActivate(array(
            'email'       => 'admin@admin.com',
            'password'    => "admin",
            'first_name'  => 'John',
            'last_name'   => 'Doe',
        ));

        $adminRole = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => array('admin' => 1),
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'Recuritor',
            'slug'  => 'recuritor',
        ]);


        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'User',
            'slug'  => 'user',
        ]);

        $admin->roles()->attach($adminRole);

        $this->command->info('Admin User created with username admin@admin.com and password admin');
    }
}
