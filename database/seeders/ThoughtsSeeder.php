<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'thought' => 'Si he visto más lejos es porque he subido a hombros de gigantes',
            'author' => 'Isaac Newton',
            'image' => 'http://www.cuartaedad.com/docs/A-hombros-de-gigantes.jpg',
            'created_at' => '2023/02/12'
        ]);

        DB::table('thoughts')->insert([
            'thought' => 'Podría estar encerrado en una cáscara de nuez y sentirme rey de un espacio infinito',
            'author' => 'William Shakespeare',
            'image' => 'https://d2n4wb9orp1vta.cloudfront.net/cms/cascaranuez-plastico.jpg;maxWidth=600',
            'created_at' => '2023/02/12'
        ]);
    }
}
