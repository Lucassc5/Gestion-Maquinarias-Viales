<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Provinces;

class ProjectController extends Controller
{
    public function show(){
        $projects = Projects::with('province')->paginate(5);
        return view('projects.Read', compact('projects'));
    }

    public function create(){
        
        $projects = Projects::with('province')->get();
        $provinces = Provinces::all();
        return view('projects.Create', compact('projects', 'provinces'));
    }

    public function store(Request $request){
        $request->validate([
            'project_name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'planned_start_date' => 'required|date',
            'planned_end_date' => 'nullable|date',
        ]);

        Projects::create([
            'project_name' => $request->project_name,
            'province_id' => $request->province_id,
            'planned_start_date' => $request->planned_start_date,
            'planned_end_date' => $request->planned_end_date,
        ]);
        return redirect()->route('viewProject');
    }

    public function edit($id){
        $projects = Projects::findOrFail($id);
        $provinces = Provinces::all();
        return view('projects.Update', compact('projects', 'provinces'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'project_name' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'planned_start_date' => 'required|date',
            'planned_end_date' => 'nullable|date',
        ]);

        $project = Projects::findOrFail($id);
        $project->update([
            'project_name' => $request->project_name,
            'province_id' => $request->province_id,
            'planned_start_date' => $request->planned_start_date,
            'planned_end_date' => $request->planned_end_date,
        ]);
        return redirect()->route('viewProject');
    }
    
    public function destroy($id){
            $project = Projects::findOrFail($id);
            $project->delete();
            return redirect()->route('viewProject');
        }
}
