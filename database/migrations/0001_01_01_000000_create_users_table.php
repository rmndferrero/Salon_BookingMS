<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            
            // Phone number replaces email as the primary unique identifier.
            $table->string('phone_number')->unique();
            
            // Keeping email optional in case you want to use it for marketing later
            $table->string('email')->unique()->nullable(); 
            
            // The unified flag
            $table->boolean('is_guest')->default(true);
            
            // Passwords must be nullable for guests
            $table->string('password')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });

        // You can leave the standard password_reset_tokens and sessions 
        // tables in this file exactly as Laravel generated them.
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};