<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reason; 

class ReasonSeeder extends Seeder
{
    
    public function run(): void
    {
        $razones = ['Se rompio la maquina', 'Se termino la obra', 'Se cambio de proyecto', 
                    'Se vendio la maquina', 'Se alquilo la maquina', 
                    'Se realizo mantenimiento', 'Se realizo limpieza', 
                    'Se realizo reparacion', 'Se realizo calibracion', 
                    'Se realizo inspeccion'];

        foreach($razones as $razon){
            Reason::create(['name_reason' => $razon]);
        }
    }
}