<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineProjects extends Model
{
    use HasFactory;

    protected $table = 'machine_projects'; 
    protected $fillable = [
    'start_date',
    'end_date',
    'reason_id',
    'kilometers',
    'project_id',
    'machine_id',
    ];


    public function machine()
    {
        return $this->belongsTo(Machine::class); 
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class); 
    }

    public function project()
    {
        return $this->belongsTo(Projects::class); 
    }
}