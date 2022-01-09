<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Dependiente']);

        //PERFIL
        Permission::create(['name' => 'profile']) -> syncRoles([$role1,$role2]);

        //PRODUCTOS
        Permission::create(['name' => 'productos.registro']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.index']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.guardar']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.editar']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.update']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.agregar']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'productos.actualizar']) -> syncRoles([$role1,$role2]);

        //VENTAS
        Permission::create(['name' => 'ventas.registro']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.guardar']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.detalle']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.print']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.list']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.editar']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.update']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.estado']) -> syncRoles([$role1,$role2]);

        Permission::create(['name' => 'ventas.ranular']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.anular']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.abono']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.gabono']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.labono']) -> syncRoles([$role1,$role2]);

        //REPORTES
        Permission::create(['name' => 'ventas.pdia']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.prango']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'ventas.reportes']) -> syncRoles([$role1,$role2]);

        //CAMBIOS
        Permission::create(['name' => 'cambios.list']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'cambios.registro']) -> syncRoles([$role1,$role2]);
        Permission::create(['name' => 'cambios.guardar']) -> syncRoles([$role1,$role2]);
        

        //ROLES Y PERMISOS
    }
}
