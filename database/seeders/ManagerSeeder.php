<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name'   => 'Admin',
            'last_name'    => 'Manager',
            'phone_number' => '0000000000', // Or whatever official number they use
            'is_guest'     => false,
            'role'         => 'manager', // This grants them access
            'password'     => Hash::make('secure_password_123'), // Change this later!
        ]);
    }
}
