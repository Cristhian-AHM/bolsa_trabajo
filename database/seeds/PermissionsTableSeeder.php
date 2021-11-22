<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);



        Permission::create([
            'name'=>'Navegar compañías',
            'slug'=>'categories.index',
            'description'=>'Lista y navega por todos las compañías del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de compañías',
            'slug'=>'categories.show',
            'description'=>'Ver en detalle cada compañía del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de compañías',
            'slug'=>'categories.edit',
            'description'=>'Editar cualquier dato de un compañía del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de compañías',
            'slug'=>'categories.create',
            'description'=>'Crea cualquier dato de una compañía del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar compañías',
            'slug'=>'categories.destroy',
            'description'=>'Eliminar cualquier dato de una compañía del sistema.',
        ]);


          

        Permission::create([
            'name'=>'Navegar por experiencia laboral',
            'slug'=>'products.index',
            'description'=>'Lista y navega por todos los experiencia laboral del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de experiencia laboral',
            'slug'=>'products.show',
            'description'=>'Ver en detalle cada experiencia laboral del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de experiencia laboral',
            'slug'=>'products.edit',
            'description'=>'Editar cualquier dato de un experiencia laboral del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de experiencia laboral',
            'slug'=>'products.create',
            'description'=>'Crea cualquier dato de un experiencia laboral del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar experiencia laboral',
            'slug'=>'products.destroy',
            'description'=>'Eliminar cualquier dato de un experiencia laboral del sistema.',
        ]);


           
        Permission::create([
            'name'=>'Navegar por estudiantes',
            'slug'=>'providers.index',
            'description'=>'Lista y navega por todos los estudiantes del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de estudiante',
            'slug'=>'providers.show',
            'description'=>'Ver en detalle cada estudiante del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de estudiantes',
            'slug'=>'providers.edit',
            'description'=>'Editar cualquier dato de un estudiante del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de estudiantes',
            'slug'=>'providers.create',
            'description'=>'Crea cualquier dato de un estudiante del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar estudiantes',
            'slug'=>'providers.destroy',
            'description'=>'Eliminar cualquier dato de un estudiante del sistema.',
        ]);


        Permission::create([
            'name'=>'Descargar PDF reporte de ofertas',
            'slug'=>'sales.pdf',
            'description'=>'Puede descargar todos los reportes de las ofertas en PDF.',
        ]);

        Permission::create([
            'name'=>'Imprimir boleta de oferta',
            'slug'=>'sales.print',
            'description'=>'Puede imprimir boletas de todas las ofertas.',
        ]);

        Permission::create([
            'name'=>'Cambiar estado de experiencia laboral',
            'slug'=>'change.status.products',
            'description'=>'Permite cambiar el estado de un experiencia laboral.',
        ]);


        Permission::create([
            'name'=>'Cambiar estado de oferta',
            'slug'=>'change.status.sales',
            'description'=>'Permite cambiar el estado de un oferta.',
        ]);


        Permission::create([
            'name'=>'Reporte por día',
            'slug'=>'reports.day',
            'description'=>'Permite ver los reportes de ofertas por día.',
        ]);
        Permission::create([
            'name'=>'Reporte por fechas',
            'slug'=>'reports.date',
            'description'=>'Permite ver los reportes por un rango de fechas de las ofertas.',
        ]);

    }
}
