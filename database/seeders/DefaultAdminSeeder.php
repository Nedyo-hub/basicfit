<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@ehb.be'], 
            [
                'name' => 'admin', 
                'password' => Hash::make('Password!321'), 
                'role' => 'admin', 
                'is_admin' => true, 
            ]
        );

       
        if ($admin->wasRecentlyCreated) {
            echo "Admin-gebruiker is succesvol aangemaakt.\n";
        } else {
            echo "Admin-gebruiker is succesvol bijgewerkt.\n";
        }
    }
}
