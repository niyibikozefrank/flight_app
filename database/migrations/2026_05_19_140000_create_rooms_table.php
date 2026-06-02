<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('gates')) {
            Schema::create('gates', function (Blueprint $table) {
                $table->id();
                $table->string('gate_number')->unique();
                $table->string('terminal')->nullable();
                $table->integer('capacity')->default(100);
                $table->enum('status', ['available', 'occupied', 'maintenance', 'cleaning', 'closed'])->default('available');
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gates');
    }
};
