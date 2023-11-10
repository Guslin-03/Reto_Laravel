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
        ["title"=>"Solicitud de permisos para acceder al repositorio wclibk"
        ,"text"=>"Se solicitan permisos para acceder al repositorio wclibk, para poder realizar tareas relacionadas con el rol"
        ,"estimated_time"=>"120"
        , "user_id"=>"3"
        , "category_id"=>"2"
        , "priority_id"=>"3"
        , "status_id"=>"1"
        , "department_id"=>"3"
        ,"created_at"=>"2023-10-19 17:23:30"
        ,"updated_at"=>now()],
         ["title"=>"Solicitud de cambio de contraseña"
        ,"text"=>"Se solicita una nueva contraseña para acceder a la VPN FortiClient ya que la anterior ha caducado","estimated_time"=>"5"
        , "user_id"=>"2"
        , "category_id"=>"3"
        , "priority_id"=>"2"
        , "status_id"=>"3"
        , "department_id"=>"2"
        , "created_at"=>"2023-10-10 08:21:30"
        , "updated_at"=>"2023-10-10 08:26:35"],
        ["title"=>"Solicitud de cambio de teclado"
        ,"text"=>"Se solicita un nuevo teclado para el ordenador de la empresa, ya que el propocionado no funciona y sin él no puedo trabajar."
        ,"estimated_time"=>"100"
        , "user_id"=>"1"
        , "category_id"=>"1"
        , "priority_id"=>"1"
        , "status_id"=>"2"
        , "department_id"=>"1"
        , "created_at"=>"2023-10-15 10:23:50"
        , "updated_at"=>now()],
        ["title"=>"Copia de seguridad interrumpida"
        ,"text"=>"Se interrumpió la copia de seguridad del pasado martes por un ataque DDoS."
        ,"estimated_time"=>"400"
        , "user_id"=>"4"
        , "category_id"=>"4"
        , "priority_id"=>"4"
        , "status_id"=>"4"
        , "department_id"=>"4"
        , "created_at"=>"2023-10-15 10:23:50"
        , "updated_at"=>now()],

        ["title"=>"Fallo de conexión con el entorno de Integración"
        ,"text"=>"Inaccesibilidad del acceso al entorno de integración por un fallo de compilación."
        ,"estimated_time"=>"250"
        , "user_id"=>"5"
        , "category_id"=>"5"
        , "priority_id"=>"5"
        , "status_id"=>"5"
        , "department_id"=>"5"
        , "created_at"=>"2023-10-15 10:23:50"
        , "updated_at"=>now()]
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
