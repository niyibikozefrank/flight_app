<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('passengers', function (Blueprint $table) {
            if (!Schema::hasColumn('passengers', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
            if (!Schema::hasColumn('passengers', 'address')) {
                $table->string('address')->nullable()->after('phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('passengers', function (Blueprint $table) {
            if (Schema::hasColumn('passengers', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('passengers', 'address')) {
                $table->dropColumn('address');
            }
        });
    }
};
