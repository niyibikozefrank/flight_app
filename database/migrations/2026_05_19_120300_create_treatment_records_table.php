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
        if (!Schema::hasTable('service_history')) {
            Schema::create('service_history', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('ground_service_id');
                $table->unsignedBigInteger('service_id');
                $table->unsignedBigInteger('passenger_id');
                $table->unsignedBigInteger('staff_id');
                $table->decimal('cost', 10, 2);
                $table->enum('status', ['pending', 'in-progress', 'completed', 'cancelled'])->default('pending');
                $table->date('service_date');
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_history');
    }
};
