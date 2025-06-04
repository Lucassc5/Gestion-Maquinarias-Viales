<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = ['Niveladora', 'Excavadora', 'Aplanadora', 'Cargadora', 'Retroexcavadora', 'Camión', 'Volteo', 'Grúa', 'Camioneta', 'Tractocamión'];

        foreach ($tipos as $tipo) {
            Type::create(['type_name' => $tipo]);
        }
    }
}