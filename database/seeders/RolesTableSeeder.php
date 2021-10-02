<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $superAdmin =  Role::create([
            'name' => 'super_admin',
            'display_name' => 'suber admin',
            'description' => 'can do anything in the project',

        ]);


        $admin =  Role::create([
            'name' => 'admin',
            'display_name' => 'sub admin',
            'description'=> 'can do few things in the project',

        ]);
    }
}
