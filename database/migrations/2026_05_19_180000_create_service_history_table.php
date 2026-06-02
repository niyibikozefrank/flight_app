<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('service_history')) {
            Schema::create('service_history', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('flight_id');
                $table->unsignedBigInteger('ground_service_id');
                $table->string('status')->default('pending');
                $table->decimal('cost', 8, 2)->nullable();
                $table->text('notes')->nullable();
                $table->timestamp('service_date')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('service_history');
    }
};
