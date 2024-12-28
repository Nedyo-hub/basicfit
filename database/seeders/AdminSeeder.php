<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@ehb.be'], 
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
                'role' => 'admin',
            ]
        );
    }
}
