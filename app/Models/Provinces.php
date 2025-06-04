<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Provinces extends Model
{
    use HasFactory;

    public function projects(){
        return $this->hasMany(Projects::class, 'province_id');
    }
}
