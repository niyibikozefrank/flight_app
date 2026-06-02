<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Add foreign key constraints to flights table after all referenced tables exist
        if (Schema::hasTable('flights') && Schema::hasTable('passengers') && Schema::hasTable('staff') && Schema::hasTable('gates')) {
            Schema::table('flights', function (Blueprint $table) {
                // Simple approach: just try to add the foreign keys
                $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('set null');
                $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
                $table->foreign('gate_id')->references('id')->on('gates')->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('flights')) {
            Schema::table('flights', function (Blueprint $table) {
                $table->dropForeign('flights_passenger_id_foreign');
                $table->dropForeign('flights_staff_id_foreign');
                $table->dropForeign('flights_gate_id_foreign');
            });
        }
    }
};

