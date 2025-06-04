<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Machine;
use App\Models\MachineProjects;
use App\Models\Projects;
use App\Models\Provinces;
use App\Models\Reason;
use Illuminate\Http\Request;
use App\Events\MachineKmEvent;
use App\Models\Parameters;

class MachineProjectController extends Controller
{
    public function show(){
        
        // Todas las asignaciones con relaciones cargadas
    $machineProjects = MachineProjects::with(['machine', 'project.province', 'reason'])->get();

    $assignedMachines = MachineProjects::with('machine', 'project.province', 'reason')->whereNull('end_date')->paginate(10, ['*'], 'assigned');
    $unassignedMachines = MachineProjects::with('machine', 'project.province', 'reason')->whereNotNull('end_date')->paginate(10, ['*'], 'unassigned');

        return view('machineProjects.Reed', compact('assignedMachines', 'unassignedMachines'));
    }
    
    public function create(){
        $projectsAvailable = Projects::whereNull('planned_end_date')->pluck('id');
        $projects = Projects::whereIn('id', $projectsAvailable)->get();
        $reasons = Reason::all();

        $machineAssigned = MachineProjects::whereNull('end_date')->pluck('machine_id');
        $machines = Machine::whereNotIn('id', $machineAssigned)->get();
        
        return view('machineProjects.Create', compact('projects', 'machines', 'reasons'));
    }
    
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'start_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'machine_id' => 'required|exists:machines,id',
        ]);

        $projects = Projects::findOrFail($request->project_id);
        if ($request->start_date < $projects->planned_start_date) {
            return back()->withErrors(['start_date' => 'La fecha de inicio no puede ser antes de la fecha de la de inicio del proyecto.'])
                        ->withInput();
        }

        MachineProjects::create([
            'start_date' => $request->start_date,
            'project_id' => $request->project_id,
            'machine_id' => $request->machine_id,
        ]);
        return redirect()->route('viewProjectMachine');
    }

    public function edit($id){
        $machineProjects = MachineProjects::findOrFail($id);
        $projects = Projects::all();
        $reason = Reason::all();
        return view('machineProjects.Update', compact('machineProjects', 'reason', 'projects'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'date',
            'reason_id' => 'exists:reasons,id',
            'kilometers' => 'nullable|numeric|min:0|max:10000',
            'project_id' => 'exists:projects,id',
        ]);

        $machineProject = MachineProjects::findOrFail($id);
        $machineProject->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason_id' => $request->reason_id,
            'project_id' => $request->project_id,
        ]);
        return redirect()->route('viewProjectMachine');
    }

    public function destroy($id){
        $machineProject = MachineProjects::findOrFail($id);
        $machineProject->delete();

        $machine = Machine::findOrFail($machineProject->machine_id);
        $resta = $machine->kilometers - $machineProject->kilometers;
        
        $machine->update([
            'kilometers' => $resta,
        ]);

        return redirect()->route('viewProjectMachine');
    }

    public function finalize($id){
        $machineProjects = MachineProjects::findOrFail($id);
        $reason = Reason::all();
        return view('machineProjects.FinalizeProject', compact('machineProjects', 'reason'));
    }

    public function finalizeUpdate(Request $request, $id){
        $request->validate([
            'end_date' => 'required|date',
            'reason_id' => 'nullable|exists:reasons,id',
            'kilometers' => 'required|numeric|min:0|max:10000',
        ]);

        $machineProject = MachineProjects::findOrFail($id);

        if($request->end_date < $machineProject->start_date) {
            return back()->withErrors(['end_date' => 'La fecha de finalización no puede ser antes de la fecha de inicio.'])
                        ->withInput();
        }

        $machineProject->update([
            'end_date' => $request->end_date,
            'reason_id' => $request->reason_id,
            'kilometers' => $request->kilometers,
        ]);

        $machine = Machine::findOrFail($machineProject->machine_id);
        event(new MachineKmEvent($machine, $request->kilometers));

        return redirect()->route('viewProjectMachine');
    }
}