<?php

use Illuminate\Database\Seeder;

class AdminUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => 'Minh Hiếu',
            'username' => 'Admin',
            'email' => 'ltmh1298@gmail.com',
            'password' => bcrypt('admin'),
            'level'=> 'Quản Lý',
        ]);
    }
}
