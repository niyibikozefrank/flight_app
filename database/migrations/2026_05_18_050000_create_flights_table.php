<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Create flights table if it doesn't exist
        if (!Schema::hasTable('flights')) {
            Schema::create('flights', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('passenger_id')->nullable();
                $table->unsignedBigInteger('staff_id')->nullable();
                $table->unsignedBigInteger('gate_id')->nullable();
                
                $table->string('flight_number')->unique();
                $table->dateTime('departure_time')->nullable();
                $table->dateTime('arrival_time')->nullable();
                $table->string('destination')->nullable();
                
                $table->decimal('price', 8, 2)->nullable();
                $table->string('aircraft_type')->nullable();
                $table->integer('capacity')->nullable();
                $table->integer('duration_minutes')->nullable();
                $table->string('booking_reference')->unique()->nullable();
                
                $table->enum('status', ['scheduled', 'boarding', 'departed', 'delayed', 'cancelled'])->default('scheduled');
                
                $table->timestamps();
                $table->softDeletes();
                
                // Indexes
                $table->index('passenger_id');
                $table->index('staff_id');
                $table->index('gate_id');
                $table->index('departure_time');
                $table->index('status');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
