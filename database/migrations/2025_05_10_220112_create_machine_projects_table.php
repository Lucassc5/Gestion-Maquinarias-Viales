<?php

use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machine_projects', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreignId('reason_id')->nullable()->constrained('reasons')->onDelete('cascade');
            $table->integer('kilometers')->nullable();
            $table->foreignId('machine_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_projects');
    }
};
