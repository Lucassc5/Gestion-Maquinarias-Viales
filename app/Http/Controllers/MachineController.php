<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Type;
use App\Models\Maintenance;

use function Laravel\Prompts\alert;

class MachineController extends Controller
{
    
    public function show()
    {
        $machine = Machine::With('type')->paginate(5);
        return view('machines.Read', compact('machine'));
    }

    public function create()
    {
        $types = Type::all();
        return view('machines.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|digits:4',
            'type' => 'required|exists:types,id',
            'model' => 'required',
        ]);

        Machine::create([
            'serial_number' => 'SN-' . $request->serial_number,
            'type' => $request->type,
            'model' => $request->model,
        ]);

        return redirect()->route('viewMachine', alert('Machine created successfully!'));
    }

    public function edit($id) {
        $machine = Machine::findOrFail($id);
        $types = Type::all(); 
        return view('machines.update', compact('machine', 'types'));
    }


    public function update(Request $request, Machine $machine){
        // dd($machine);
        $request->validate([
            'serial_number' => 'required|digits:4',
            'type' => 'required|exists:types,id',
            'model' => 'required|digits:4',
        ]);

        $machine->update([
            'serial_number' => 'SN-' . $request->serial_number,
            'type' => $request->type,
            'model' => $request->model,
        ]);
        
        return redirect()->route('viewMachine');
    }


    public function destroy($id){
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->route('viewMachine');
    }

}