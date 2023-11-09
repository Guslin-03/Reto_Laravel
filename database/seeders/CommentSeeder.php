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
        ["text"=>"Quiero para navidad un Blackmagic Design DaVinci Resolve Editor","minutesUsed"=>10,"issue_id"=>3,"user_id"=>1]
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
