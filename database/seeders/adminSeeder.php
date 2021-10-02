<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Admin;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Admin =  Admin::create([
            'name' => 'super admin',
            'email' => 'admin@super.com',
            'password' => bcrypt('123456789'),

        ]); 

        $sub_Admin =  Admin::create([
            'name' => 'admin',
            'email' => 'admin@sub.com',
            'password' => bcrypt('123456789'),

        ]); 

            $Admin->attachRole('super_admin');

            $sub_Admin->attachRole('admin');

    }
}
