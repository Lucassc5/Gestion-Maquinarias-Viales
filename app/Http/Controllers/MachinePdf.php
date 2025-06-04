<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MachineProjects;

class MachinePdf extends Controller
{

    public function exportarMaquinasAsignadas()
    {
        $assignedMachines = MachineProjects::with(['project.province', 'machine', 'reason'])
            ->whereNull('end_date') 
            ->get();

        $pdf = Pdf::loadView('pdf.Machine', compact('assignedMachines'));

        return $pdf->stream('maquinas_asignadas.pdf');
    }

}
