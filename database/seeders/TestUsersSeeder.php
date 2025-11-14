<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@mail.com', 
            'password' => Hash::make('1234567890')
        ]);

        $admin->assignRole('administrador');
        $allPermissions = Permission::pluck('name')->toArray();
        $admin->givePermissionTo($allPermissions);

        $agent1 = User::create(['name' => 'Jhon Deer', 'email' => 'jhon@mail.com', 'password' => Hash::make('1234567890')]);

        $agent1->assignRole('agente');
        $agent1->givePermissionTo([
            "consultar propiedades",
            "consultar items",
            "consultar clientes",
            "crear clientes",
            "editar clientes",
            "consultar obreros",
            "consultar presupuestos",
            "crear presupestos"
        ]);

        $agent2 = User::create(['name' => 'Ari Gibson', 'email' => 'ari@mail.com', 'password' => Hash::make('1234567890')]);

        $agent2->assignRole('agente');
        $agent2->givePermissionTo([
            "consultar propiedades",
            "consultar items",
            "consultar clientes",
            "crear clientes",
            "editar clientes",
            "consultar obreros",
            "consultar presupuestos",
            "crear presupestos"
        ]);

        $agent3 = User::create(['name' => 'Christopher Larkin', 'email' => 'chris@mail.com', 'password' => Hash::make('1234567890')]);

        $agent3->assignRole('agente');
        $agent3->givePermissionTo([
            "consultar propiedades",
            "consultar items",
            "consultar clientes",
            "crear clientes",
            "editar clientes",
            "consultar obreros",
            "consultar presupuestos",
            "crear presupestos"
        ]);
    }
}
