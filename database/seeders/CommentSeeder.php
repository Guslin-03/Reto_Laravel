<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments=[
        ["text"=>"Debido a la continua caida del entorno de Integración varios usuarios sobretodo del equipo de MAC esta teniendo dificultades.","minutesUsed"=>1000,"issue_id"=>1,"user_id"=>3],
        ["text"=>"Cada 30 dias nos gusta molestar a nuestros trabajadores para que acudan a cambiar su password añadiendo un digito mas :3","minutesUsed"=>30,"issue_id"=>2,"user_id"=>2],
        ["text"=>"Quiero para navidad un Blackmagic Design DaVinci Resolve Editor","minutesUsed"=>10,"issue_id"=>3,"user_id"=>1],
        ["text"=>"Parece ser que se detecto a altas horas de la madrugada un ataque con mas de 10.000 peticiones por segundo","minutesUsed"=>100,"issue_id"=>4,"user_id"=>4],
        ["text"=>"Parece ser que el problema en integración es sobre el commit subido el 12/11/2023","minutesUsed"=>60,"issue_id"=>5,"user_id"=>5]
        ];
        foreach ($comments as $comment) {
            $this->attemptInsertion($comment);
        }
    }

    private function attemptInsertion(array $comment):void
    {
        DB::table('comments')->insert($comment);
    }
}
