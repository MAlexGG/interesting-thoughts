<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Alex',
            'email' => 'a@mail.com',
            'email_verified_at' => null,
            'password' => Hash::make('password'),
            'created_at' => '2023/03/05'
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Laura',
            'email' => 'l@mail.com',
            'email_verified_at' => null,
            'password' => Hash::make('password'),
            'created_at' => '2023/03/05'
        ]);
    }
}
