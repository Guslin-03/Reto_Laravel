<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()


    {
        $issues=[
         ["title"=>"Solicitud de permisos para acceder al repositorio wclibk","text"=>"Se solicitan permisos para acceder al repositorio wclibk, para poder realizar tareas relacionadas con el rol","estimated_time"=>"30", "user_id"=>"3", "category_id"=>"2", "priority_id"=>"3", "status_id"=>"1", "department_id"=>"3",  "created_at"=>"2023-10-19 17:23:30","updated_at"=>now()],  
         ["title"=>"Solicitud de cambio de contraseña","text"=>"Se solicita una nueva contraseña para acceder a la VPN FortiClient ya que la anterior ha caducado","estimated_time"=>"5", "user_id"=>"2", "category_id"=>"3", "priority_id"=>"2", "status_id"=>"3", "department_id"=>"2",  "created_at"=>"2023-10-10 08:21:30","updated_at"=>"2023-10-10 08:26:35"],
         ["title"=>"Solicitud de cambio de teclado","text"=>"Se solicita un nuevo teclado para el ordenador de la empresa, ya que el propocionado no funciona y sin él no puedo trabajar ","estimated_time"=>"15", "user_id"=>"1", "category_id"=>"1", "priority_id"=>"1", "status_id"=>"2", "department_id"=>"1",  "created_at"=>"2023-10-15 10:23:50","updated_at"=>now()]
        ];
        foreach ($issues as $issue) {
            $this->attemptInsertion($issue);
        }
    }
    /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $issue):void
    {
       
        DB::table('issues')->insert($issue);
       
    }
        
    }

