<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameters;

class ParametersController extends Controller
{
    public function index()
    {
        $parameters = Parameters::first();
        return view('parameters.Read', compact('parameters'));
    }

    public function edit($id){
        $parameters = Parameters::findOrFail($id);
        return view('parameters.Edit', compact('parameters'));
    }
    
    public function update(Request $request, Parameters $parameters)
    {
        $request->validate([
            'value' => 'required|integer|min:0',
        ]);

        $parameters->update([
            'value' => $request->value,
        ]);

        return redirect()->route('viewParameters');
    }
}
