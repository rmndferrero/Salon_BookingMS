<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
            // The name of the service or package
            $table->string('name'); 
            
            // Using 'text' instead of 'string' to allow for long, detailed package descriptions
            $table->text('description')->nullable(); 
            
            // Decimal is the safest type for financial data to accurately handle currencies like AED. 
            // 8 total digits, 2 digits after the decimal point (e.g., 999999.99)
            $table->decimal('price', 8, 2); 
            
            // How long the appointment takes (essential for booking calendar logic)
            $table->integer('duration_minutes')->default(60); 
            
            // A simple flag to distinguish between a single service and a full package
            $table->boolean('is_package')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
