<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'], 
            [
                'name' => 'Admin',
                'password' => Hash::make('Password!321'), 
                'is_admin' => true, 
            ]
        );
    }
}
