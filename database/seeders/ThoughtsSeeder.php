<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;

class ThoughtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thoughts')->insert([
            'thought' => '"Si he visto más lejos es porque he subido a hombros de gigantes"',
            'author' => 'Isaac Newton',
            'image' => 'img/Image01.jpg',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);

        DB::table('thoughts')->insert([
            'thought' => '"Podría estar encerrado en una cáscara de nuez y sentirme rey de un espacio infinito"',
            'author' => 'William Shakespeare',
            'image' => 'img/Image02.jpg',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Si crees que puedes o no puedes igual tienes la razón"',
            'author' => 'Henry Ford',
            'image' => 'img/Image03.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"En las pantallas vemos pero no miramos, oímos pero no escuchamos. La piel no existe, no hay caricia ni textura ni temperatura. No hay aroma (cada uno de nosotros tiene el propio, inconfundible, instransferible) se pierde la familiaridad con el amor"',
            'author' => 'Sergio Sinay',
            'image' => 'img/Image04.jpg',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Nadie puede hacerte sentir inferior sin tu consentimiento"',
            'author' => 'Eleanor Roosvelt',
            'image' => 'img/Image05.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Valiente es aquel que hace las cosas aunque sienta miedo, quien las hace sin miedo es habilidoso"',
            'author' => 'Helen Flix',
            'image' => 'img/Image06.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
    }
}
