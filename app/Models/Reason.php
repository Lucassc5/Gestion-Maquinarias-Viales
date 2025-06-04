<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;

    public function machineProjects()
    {
        return $this->hasMany(MachineProjects::class); 
    }
}