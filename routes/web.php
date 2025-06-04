<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineProjectController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ParametersController;
use App\Models\Machine;
use Pest\Configuration\Project;
use App\Http\Controllers\MachinePdf;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/viewMachine', [MachineController::class, 'show'])->name('viewMachine');
    Route::get('/createMachine', [MachineController::class, 'create'])->name('createMachine');
    Route::post('/createMachine', [MachineController::class, 'store'])->name('storeMachine');
    Route::get('/editMachine, {id}', [MachineController::class, 'edit'])->name('editMachine');
    Route::put('/updateMachine/{machine}', [MachineController::class, 'update'])->name('updateMachine');
    Route::delete('/deleteMachine/{id}', [MachineController::class, 'destroy'])->name('deleteMachine');
});

Route::middleware('auth')->group(function () {
    Route::get('/viewMaintenance', [MaintenanceController::class, 'show'])->name('viewMaintenance');
    Route::get('/createMaintenance', [MaintenanceController::class, 'create'])->name('createMaintenance');
    Route::post('/createMaintenance', [MaintenanceController::class, 'store'])->name('storeMaintenance');
    Route::get('/editMaintenance/{id}', [MaintenanceController::class, 'edit'])->name('editMaintenance');
    Route::put('/updateMaintenance/{maintenance}', [MaintenanceController::class, 'update'])->name('updateMaintenance');
    Route::delete('/deleteMaintenance/{id}', [MaintenanceController::class, 'destroy'])->name('deleteMaintenance');
});

Route::middleware('auth')->group(function () {
    Route::get('/viewMachineProject', [MachineProjectController::class, 'show'])->name('viewProjectMachine');
    Route::get('/createMachineProject', [MachineProjectController::class, 'create'])->name('createProjectMachine');
    Route::post('/createMachineProject', [MachineProjectController::class, 'store'])->name('storeProjectMachine');
    Route::get('/editMachineProject/{id}', [MachineProjectController::class, 'edit'])->name('editProjectMachine');
    Route::put('/updateMachineProject/{machineProject}', [MachineProjectController::class, 'update'])->name('updateProjectMachine'); 
    Route::delete('/deleteMachineProject/{id}', [MachineProjectController::class, 'destroy'])->name('deleteProjectMachine');
    Route::get('/finalizeMachineProject/{id}',[MachineProjectController::class, 'finalize'])->name('finalizeProjectMachine');
    Route::put('/updateMachineProject/{machineProject}/finalize', [MachineProjectController::class, 'finalizeUpdate'])->name('finalizeUpdateProjectMachine');
    });

Route::middleware('auth')->group(function () {
    Route::get('/viewProject', [ProjectController::class, 'show'])->name('viewProject');
    Route::get('/createProject', [ProjectController::class, 'create'])->name('createProject');
    Route::post('/createProject', [ProjectController::class, 'store'])->name('storeProject');
    Route::get('/editProject/{id}', [ProjectController::class, 'edit'])->name('editProject');
    Route::put('/updateProject/{project}', [ProjectController::class, 'update'])->name('updateProject');
    Route::delete('/deleteProject/{id}', [ProjectController::class, 'destroy'])->name('deleteProject');
});

Route::middleware('auth')->group(function () {
    Route::get('/viewParameters', [ParametersController::class, 'index'])->name('viewParameters');
    Route::get('/editParameters/{id}', [ParametersController::class, 'edit'])->name('editParameters');
    Route::put('/parameters/{parameters}', [ParametersController::class, 'update'])->name('updateParameters');
});

Route::get('/maquinas-asignadas/pdf', [MachinePdf::class, 'exportarMaquinasAsignadas'])->name('exportar.maquinas.asignadas');
    
require __DIR__.'/auth.php';