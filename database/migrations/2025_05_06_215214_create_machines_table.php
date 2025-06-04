<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('serial_number')->unique();
            $table->foreignId('type')->constrained()->onDelete('cascade');
            $table->string('model');
            $table->integer('kilometers')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
