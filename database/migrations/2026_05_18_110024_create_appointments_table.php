<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('flights')) {
            Schema::create('flights', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('passenger_id');
                $table->unsignedBigInteger('staff_id');
                $table->unsignedBigInteger('gate_id')->nullable();
                $table->string('flight_number')->unique();
                $table->dateTime('departure_time');
                $table->dateTime('arrival_time');
                $table->string('destination');
                $table->string('status')->default('scheduled');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};