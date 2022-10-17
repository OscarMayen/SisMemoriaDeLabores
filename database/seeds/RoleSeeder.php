<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Registrador']);


        $permission1 = Permission::create(['name' => 'admin.usuarios.index', 'description'=>'Ver listado de usuarios']);
        $permission2 = Permission::create(['name' => 'admin.usuarios.edit', 'description'=>'Asignar roles a usuario']);

        //Administracion de Roles
        $permission3 = Permission::create(['name' => 'admin.roles.index', 'description'=>'Ver listado de Roles']);
        $permission4 = Permission::create(['name' => 'admin.roles.edit', 'description'=>'Editar roles']);

        $todos= [$permission1,
        $permission2,
        $permission3,
        $permission4
    ];

        //PARA ROL DE ADMINISTRADOR
        $role1->syncPermissions($todos);

        //PARA Registrador
        $role2->syncPermissions([

            $permission3,
            $permission4,
          
        ]);

    }
}