<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['name'=>'Admin Smart', 'email' => 'admin@smartads.com', 'is_admin' => 1, 'package_id' => 0, 'password' => '$2y$10$90ssO/pXHciTs8wA891g2OffFU6Wd.8sqgOGwI9razanyRrd27PRq', 'status' => 1]);
//        \App\User::create(['name'=>'customer Smart', 'email' => 'customer@smartads.com', 'is_admin' => 0, 'package_id' => 1, 'password' => '$2y$10$90ssO/pXHciTs8wA891g2OffFU6Wd.8sqgOGwI9razanyRrd27PRq', 'status' => 1]);
    }
}
