<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('project_name');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->date('planned_start_date');
            $table->date('planned_end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
