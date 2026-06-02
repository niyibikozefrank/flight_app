<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('flights')) {
            Schema::table('flights', function (Blueprint $table) {
                // Only add notes column if it doesn't exist
                if (!Schema::hasColumn('flights', 'notes')) {
                    $table->text('notes')->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            if (Schema::hasColumn('flights', 'notes')) {
                $table->dropColumn('notes');
            }
        });
    }
};