<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'Employer',
            'slug'  => 'employer',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'Worker',
            'slug'  => 'worker',
        ]);
        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'company',
            'slug'  => 'company',
        ]);
    }
}
