<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Add missing columns to service_history table
        if (Schema::hasTable('service_history')) {
            Schema::table('service_history', function (Blueprint $table) {
                // Add passenger_id if it doesn't exist
                if (!Schema::hasColumn('service_history', 'passenger_id')) {
                    $table->unsignedBigInteger('passenger_id')->nullable()->after('id');
                    $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');
                }
                
                // Add service_id if it doesn't exist
                if (!Schema::hasColumn('service_history', 'service_id')) {
                    $table->unsignedBigInteger('service_id')->nullable()->after('passenger_id');
                    $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
                }
                
                // Add staff_id if it doesn't exist
                if (!Schema::hasColumn('service_history', 'staff_id')) {
                    $table->unsignedBigInteger('staff_id')->nullable()->after('service_id');
                    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
                }
                
                // Ensure ground_service_id column exists (create if missing)
                if (!Schema::hasColumn('service_history', 'ground_service_id')) {
                    $table->unsignedBigInteger('ground_service_id')->nullable()->after('staff_id');
                    $table->foreign('ground_service_id')->references('id')->on('ground_services')->onDelete('cascade');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('service_history')) {
            Schema::table('service_history', function (Blueprint $table) {
                // Drop foreign keys using Laravel's dropForeignIfExists method
                $table->dropForeignIfExists('service_history_passenger_id_foreign');
                $table->dropForeignIfExists('service_history_service_id_foreign');
                $table->dropForeignIfExists('service_history_staff_id_foreign');
                $table->dropForeignIfExists('service_history_ground_service_id_foreign');
                
                // Drop columns if they exist
                $columnsToDelete = ['passenger_id', 'service_id', 'staff_id', 'ground_service_id'];
                foreach ($columnsToDelete as $column) {
                    if (Schema::hasColumn('service_history', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};

