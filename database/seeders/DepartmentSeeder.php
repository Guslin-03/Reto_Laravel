<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{

         /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments=[
         ["name"=>"Ventas", "headquarters"=>"Valencia",
         "description"=>"El departamento de ventas se encarga de vender productos o servicios para generar ingresos y contribuir al crecimiento de la empresa mediante estrategias de promoción, comercialización y cierre de acuerdos con los clientes. Su objetivo es alcanzar metas de venta y brindar un excelente servicio al cliente." ,
         "created_at"=>now(),"updated_at"=>now()],
         ["name"=>"RRHH", "headquarters"=>"Bilbao",
         "description"=>"El departamento de recursos humanos se centra en la gestión del personal de una empresa. Sus funciones incluyen reclutamiento, contratación, capacitación, desarrollo, gestión del desempeño, manejo de conflictos, nómina y políticas internas.Su objetivo es optimizar el talento humano, fomentar un buen ambiente laboral y asegurar el cumplimiento de políticas y leyes laborales.",
         "created_at"=>now(),"updated_at"=>now()],
         ["name"=>"IT", "headquarters"=>"Madrid",
         "description"=>"El departamento de IT se encarga de gestionar y mantener la tecnología de una empresa. Esto incluye hardware, software, redes y seguridad. Su objetivo es asegurar que la tecnología respalde las operaciones comerciales de manera eficiente y segura." ,
         "created_at"=>now(), "updated_at"=>now()]
        ];
        foreach ($departments as $department) {
            $this->attemptInsertion($department);
        }
    }
    /**
     * Intenta insertar un registro
     *
     * @param array{id:string,description:string} $record
     * @return void
     **/
    private function attemptInsertion(array $department):void
    {

        DB::table('departments')->insert($department);

    }

    }
