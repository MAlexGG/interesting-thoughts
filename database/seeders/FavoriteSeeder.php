<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            'thought_id' => 1,
            'user_id' => 1,
            'created_at' => '2023/03/07'
        ]);

        DB::table('favorites')->insert([
            'thought_id' => 1,
            'user_id' => 2,
            'created_at' => '2023/03/07'
        ]);

        DB::table('favorites')->insert([
            'thought_id' => 2,
            'user_id' => 2,
            'created_at' => '2023/03/07'
        ]);
    }
}
