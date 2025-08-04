<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            // Drop the phone and employees columns
            $table->dropColumn(['phone', 'employees']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            // If you need to rollback, add back the dropped columns
            $table->string('phone')->nullable()->after('email');
            $table->string('employees')->nullable()->after('company');
        });
    }
};