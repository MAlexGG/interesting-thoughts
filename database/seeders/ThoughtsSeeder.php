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
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Library_of_Congress%2C_Rosenwald_4%2C_Bl._5r.jpg/709px-Library_of_Congress%2C_Rosenwald_4%2C_Bl._5r.jpg',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);

        DB::table('thoughts')->insert([
            'thought' => '"Podría estar encerrado en una cáscara de nuez y sentirme rey de un espacio infinito"',
            'author' => 'William Shakespeare',
            'image' => 'https://d2n4wb9orp1vta.cloudfront.net/cms/cascaranuez-plastico.jpg;maxWidth=600',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Si crees que puedes o no puedes igual tienes la razón"',
            'author' => 'Henry Ford',
            'image' => 'https://www.motorbiscuit.com/wp-content/uploads/2021/09/Ford-Model-T-scaled.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"En las pantallas vemos pero no miramos, oímos pero no escuchamos. La piel no existe, no hay caricia ni textura ni temperatura. No hay aroma (cada uno de nosotros tiene el propio, inconfundible, instransferible) se pierde la familiaridad con el amor"',
            'author' => 'Sergio Sinay',
            'image' => 'https://asouthernsoiree.com/wp-content/uploads/2016/02/love-blog.jpg',
            'user_id' => 1,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Nadie puede hacerte sentir inferior sin tu consentimiento"',
            'author' => 'Eleanor Roosvelt',
            'image' => 'https://educacion30.b-cdn.net/wp-content/uploads/2021/04/self-esteem.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
        DB::table('thoughts')->insert([
            'thought' => '"Valiente es aquel que hace las cosas aunque sienta miedo, quien las hace sin miedo es habilidoso"',
            'author' => 'Helen Flix',
            'image' => 'https://cadenaser.com/resizer/9NY7YPCPFD-h3wDiMdBZD5nL4qg=/736x552/filters:format(jpg):quality(70)/cloudfront-eu-central-1.images.arcpublishing.com/prisaradio/JEP5AQAHIBNSPCX6UBAY2VIMDQ.jpg',
            'user_id' => 2,
            'created_at' => '2023/02/12'
        ]);
    }
}
