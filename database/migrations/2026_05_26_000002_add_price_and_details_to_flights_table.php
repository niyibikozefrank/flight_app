<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            // Add price field if it doesn't exist
            if (!Schema::hasColumn('flights', 'price')) {
                $table->decimal('price', 8, 2)->nullable()->after('destination');
            }
            
            // Add aircraft type
            if (!Schema::hasColumn('flights', 'aircraft_type')) {
                $table->string('aircraft_type')->nullable()->after('price');
            }
            
            // Add capacity
            if (!Schema::hasColumn('flights', 'capacity')) {
                $table->integer('capacity')->nullable()->after('aircraft_type');
            }
            
            // Add duration in minutes
            if (!Schema::hasColumn('flights', 'duration_minutes')) {
                $table->integer('duration_minutes')->nullable()->after('capacity');
            }
            
            // Add booking reference
            if (!Schema::hasColumn('flights', 'booking_reference')) {
                $table->string('booking_reference')->unique()->nullable()->after('duration_minutes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumnIfExists('price');
            $table->dropColumnIfExists('aircraft_type');
            $table->dropColumnIfExists('capacity');
            $table->dropColumnIfExists('duration_minutes');
            $table->dropColumnIfExists('booking_reference');
        });
    }
};
