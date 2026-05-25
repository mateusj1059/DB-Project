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
            'name'     => 'Super Admin',
            'email'    => 'superadmin@admin.com',
            'password' => Hash::make('password123'),
        ]);
        $user->assignRole('superadmin');
    }
}
