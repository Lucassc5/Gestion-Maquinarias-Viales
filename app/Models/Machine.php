<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = ['serial_number', 'type', 'model', 'kilometers'];


    public function machineProjects(){
        return $this->hasMany(MachineProjects::class, 'machine_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type');
    }

    public function maintenance(){
        return $this->hasMany(Maintenance::class, 'machine_id');
    }
}