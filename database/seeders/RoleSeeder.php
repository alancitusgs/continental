<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Disenador']);
        $role3 = Role::create(['name'=>'Auditor']);
        $role4 = Role::create(['name'=>'Docente']);
        
        Permission::create(['name' => 'laravel-example-user-management'])->syncRoles([$role1]);
        Permission::create(['name' => 'app-acceso-programas'])->syncRoles([$role1]);
        Permission::create(['name' => 'app-acceso-temporadas'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'app-acceso-cursos'])->syncRoles([$role1]);

        
    }

            //$permission->syncRole($role); un rol
//$permission->syncRoles($roles); multiples
}
