<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin2'),
            'role' => 'admin',
        ]);
    }
}
