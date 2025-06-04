<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinces;

class ProvincesSeeder extends Seeder
{
    public function run(): void 
    {
        $provincias = ['Entre Rios', 'Buenos Aires', 'Santa Fe', 'Cordoba', 'Mendoza', 'San Juan',
            'San Luis', 'La Pampa','Santiago del Estero', 'Catamarca', 'La Rioja', 'Tierra del Fuego', 
            'Chubut', 'Santa Cruz', 'Neuquen','Rio Negro', 'Chaco', 'Misiones', 'Corrientes', 'Salta', 
            'Jujuy', 'Formosa', 'Tucuman'];

        foreach ($provincias as $provincia) {
            Provinces::create(['province_name' => $provincia]);
        }
    }
}