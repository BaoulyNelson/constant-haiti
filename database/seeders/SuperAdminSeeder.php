<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Vérifie si l'utilisateur avec cet email existe déjà
        $user = User::where('email', 'elconquistadorbaoulyn@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'baoulynelson',
                'email' => 'elconquistadorbaoulyn@gmail.com',
                'password' => Hash::make('22185244Bn@'), // Remplacez par un mot de passe sécurisé
                'is_admin' => 1, // Assurez-vous que 'is_admin' est défini comme un integer dans la base de données
            ]);
        } else {
            // Optionnel : Afficher un message dans la console si l'utilisateur existe déjà
            $this->command->info('L\'utilisateur Super Admin existe déjà.');
        }
    }
}
