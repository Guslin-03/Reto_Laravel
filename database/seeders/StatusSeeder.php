<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses=[
            ["name"=>"En proceso"],
            ["name"=>"Bloqueado"],
            ["name"=>"Finalizada"],
            ["name"=>"Reabierto"],
            ["name"=>"Revisión"]
           ];
           foreach ($statuses as $status) {
               $this->attemptInsertion($status);
           }
    }

    /**
     * Intenta insertar un registro
     *
     * @param array{id:bigInteger,name:string} $record
     * @return void
     **/
    private function attemptInsertion(array $status):void
    {

        DB::table('statuses')->insert($status);

    }
}
