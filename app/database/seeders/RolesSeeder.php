<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'usuario']);
        Role::create(['name' => 'visor']);

        // Crear usuario superadmin por defecto
       $user = User::create([
            'name'     => 'Mateus',
            'email'    => 'mateusjhon2105@gmail.com',
            'password' => Hash::make('Etitc2105'),
            ]);
        $user->assignRole('superadmin');

        // Dominios permitidos por defecto
        \App\Models\Dominio::insert([
            ['nombre_dominio' => 'gmail.com'],
            ['nombre_dominio' => 'hotmail.com'],
            ['nombre_dominio' => 'outlook.com'],
            ['nombre_dominio' => 'yahoo.com'],
        ]);
    }
}
