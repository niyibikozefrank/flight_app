<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('service_records')) {
            Schema::create('service_records', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('passenger_id');
                $table->unsignedBigInteger('flight_id');
                $table->unsignedBigInteger('service_id');
                $table->string('status')->default('pending');
                $table->text('notes')->nullable();
                $table->timestamp('service_date')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('service_records');
    }
};
