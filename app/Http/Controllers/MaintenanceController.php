<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Machine;
use App\Models\MachineProjects;
use App\Models\Type;

class MaintenanceController extends Controller
{
    public function show()
    {
        $maintenance = Maintenance::with('machine')->paginate(5);
        $machines = Machine::All();
        return view('maintenance.Read', compact('maintenance', 'machines'));
    }

    public function create()
    {
        $maintenance = Maintenance::with('machine')->get();
        
        $machineAvailable = MachineProjects::whereNull('end_date')->pluck('machine_id');
        $machines = Machine::whereNotIn('id', $machineAvailable)->get();

        return view('maintenance.Create', compact('maintenance', 'machines'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'maintenance_date' => 'required|date',
            'maintenance_type' => 'required|string|max:255',
            'kilometers' => 'nullable|numeric|min:0',
        ]);

        Maintenance::create([
            'machine_id' => $request->machine_id,
            'maintenance_date' => $request->maintenance_date,
            'maintenance_type' => $request->maintenance_type,
            'kilometers' => $request->kilometers,
        ]);

        return redirect()->route('viewMaintenance');
    }

    public function edit($id) {
        $maintenance = Maintenance::findOrFail($id);
        $machine = Machine::all();
        return view('maintenance.Update', compact('maintenance', 'machine'));
    }


    public function update(Request $request, $id){
        // dd($machine);
        $request->validate([
            'maintenance_date' => 'required|date',
            'maintenance_type' => 'required',
            'kilometers' => 'nullable|numeric|min:0', 
            'machine_id' => 'required|exists:machines,id',
        ]);


        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update([
            'maintenance_date' => $request->maintenance_date,
            'maintenance_type' => $request->maintenance_type,
            'kilometers' => $request->kilometers,
            'machine_id' => $request->machine_id,
        ]);

        return redirect()->route('viewMaintenance');
    }


    public function destroy($id){
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('viewMaintenance');
    }
}
