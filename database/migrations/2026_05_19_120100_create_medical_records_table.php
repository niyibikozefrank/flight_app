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
        if (!Schema::hasTable('service_records')) {
            Schema::create('service_records', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('passenger_id');
                $table->unsignedBigInteger('service_id');
                $table->text('details')->nullable();
                $table->text('notes')->nullable();
                $table->decimal('cost', 10, 2)->default(0);
                $table->date('record_date');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_records');
    }
};
