<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

      protected $fillable = [
        'project_name',
        'province_id',
        'planned_start_date',
        'planned_end_date',];

   public function province(){
    return $this->belongsTo(Provinces::class);
   }

   public function machineProjects(){
    return $this->hasMany(MachineProjects::class);
   }
}