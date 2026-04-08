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
        Schema::table('booking_service', function (Blueprint $table) {
            // Nullable because the manager assigns this AFTER the booking is requested
            $table->foreignId('employee_id')->nullable()->constrained('employees')->nullOnDelete();
            
            // Tracking the exact timeline for sequential services
            $table->time('service_start_time')->nullable();
            $table->time('service_end_time')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('booking_service', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['employee_id', 'service_start_time', 'service_end_time']);
        });
    }
};
