<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Andres Perez', 
            'email' => 'aperez@mdit.com',
            'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create(['name' => 'Administrador de Sistema']);
        Permission::create(["name"=>'books-listado'])->syncRoles([$role]);
        Permission::create(["name"=>'books-crear'])->syncRoles([$role]);
        Permission::create(["name"=>'books-deshabilitar'])->syncRoles([$role]);
        Permission::create(["name"=>'books-ver'])->syncRoles([$role]);
        Permission::create(["name"=>'books-editar'])->syncRoles([$role]);
      

        $user->assignRole([$role->id]);
    }
}
