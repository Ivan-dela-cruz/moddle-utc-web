<?php

use App\Teacher;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');


        /// crea los permisos para el crud del roles
        ///
        Permission::create(['name' => 'create_role', 'modulo' => 'Roles', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_role', 'modulo' => 'Roles', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_role', 'modulo' => 'Roles', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_role', 'modulo' => 'Roles', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud del usuario
        ///
        Permission::create(['name' => 'create_user', 'modulo' => 'Usuarios', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_user', 'modulo' => 'Usuarios', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_user', 'modulo' => 'Usuarios', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_user', 'modulo' => 'Usuarios', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud del techier

        Permission::create(['name' => 'create_techier', 'modulo' => 'Profesores', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_techier', 'modulo' => 'Profesores', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_techier', 'modulo' => 'Profesores', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_techier', 'modulo' => 'Profesores', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud de los students

        Permission::create(['name' => 'create_student', 'modulo' => 'Estudiantes', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_student', 'modulo' => 'Estudiantes', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_student', 'modulo' => 'Estudiantes', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_student', 'modulo' => 'Estudiantes', 'alias' => 'Eliminar']);

        /// crea los permisos para el crud de los levels
        Permission::create(['name' => 'create_level', 'modulo' => 'Ciclos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_level', 'modulo' => 'Ciclos', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_level', 'modulo' => 'Ciclos', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_level', 'modulo' => 'Ciclos', 'alias' => 'Eliminar ']);

        //permisos para el crud de los courses
        Permission::create(['name' => 'create_course', 'modulo' => 'Cursos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_course', 'modulo' => 'Cursos', 'alias' => 'Leer Cursos']);
        Permission::create(['name' => 'update_course', 'modulo' => 'Cursos', 'alias' => 'Modificar ']);
        Permission::create(['name' => 'destroy_course', 'modulo' => 'Cursos', 'alias' => 'Eliminar ']);

        //permisos para el crud de los subjects
        Permission::create(['name' => 'create_subject', 'modulo' => 'Materias', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_subject', 'modulo' => 'Materias', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_subject', 'modulo' => 'Materias', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_subject', 'modulo' => 'Materias', 'alias' => 'Eliminar']);

        //permisos para el crud de los tasks
        Permission::create(['name' => 'create_task', 'modulo' => 'Tareas', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_task', 'modulo' => 'Tareas', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_task', 'modulo' => 'Tareas', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_task', 'modulo' => 'Tareas', 'alias' => 'Eliminar']);

        //permisos para el crud de los academic period
        Permission::create(['name' => 'create_ac_period', 'modulo' => 'Periodos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_ac_period', 'modulo' => 'Periodos', 'alias' => 'Leer']);
        Permission::create(['name' => 'update_ac_period', 'modulo' => 'Periodos', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_ac_period', 'modulo' => 'Periodos', 'alias' => 'Eliminar']);

        //permisos para el crud de los files
        Permission::create(['name' => 'create_file', 'modulo' => 'Archivos', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_file', 'modulo' => 'Archivos', 'alias' => 'Leer ']);
        Permission::create(['name' => 'update_file', 'modulo' => 'Archivos', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_file', 'modulo' => 'Archivos', 'alias' => 'Eliminar']);

        //permisos para el crud de educacion continua
        Permission::create(['name' => 'create_education', 'modulo' => 'Educación Continua', 'alias' => 'Crear']);
        Permission::create(['name' => 'read_education', 'modulo' => 'Educación Continua', 'alias' => 'Leer ']);
        Permission::create(['name' => 'update_education', 'modulo' => 'Educación Continua', 'alias' => 'Modificar']);
        Permission::create(['name' => 'destroy_education', 'modulo' => 'Educación Continua', 'alias' => 'Eliminar']);


        /// role super admin
        $role = Role::create(['name' => 'SuperAdmin', 'description' => 'Rol de superadmin', 'status' => true]);
        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Estudiante', 'description' => 'Rol de estudiante', 'status' => true]);
        $role = Role::create(['name' => 'Profesor', 'description' => 'Rol de profesor', 'status' => true]);

        $role = Role::create(['name' => 'Administrador', 'description' => 'Rol de administrador', 'status' => true]);
        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());

        ///crearmos el usario por defecto
        $user_password = Hash::make('superadmin');
        $user = User::create(['name' => 'superadmin', 'email' => 'superadmin@gmail.com', 'password' => $user_password,]);
        $user->assignRole('SuperAdmin');

        $user_password = Hash::make('root1234');
        $user2 = User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => $user_password,]);
        $user2->assignRole('Administrador');

        $teacher_password = Hash::make('profesor');
        $permitted_chars = '0123456789';
        for ($i = 0; $i < 10; $i++) {
            $user_t = User::create([
                'name' => 'Profesor',
                'last_name' => 'Apellido'.$i,
                'email' => 't'.$i.'@email.com',
                'password' => $teacher_password,
                'url_image' =>  'img/user.jpg'
                ]);
            \App\Address\Address::create([
                'address' => 'Direccion'.$i,
                'user_id' => $user_t->id,
                'parish_id' => rand(1,1000)
            ]);
            $user_t->assignRole('Profesor');
            $teacher = Teacher::create([
                'user_id'=>$user_t->id,
                'name'=>$user_t->name,
                'last_name'=>$user_t->last_name,
                'url_image'=> $user_t->url_image,
                'email'=> $user_t->email,
                'dni'=> substr(str_shuffle($permitted_chars), 0, 9),
                'phone'=> substr(str_shuffle($permitted_chars), 0, 9),
                'profession'=> 'Profesion'.$i,
            ]);
        }

        $student_password = Hash::make('estudiante');
        for ($i = 0; $i < 10; $i++) {
            $user_s = User::create([
                'name' => 'Estudiante',
                'last_name' => 'Apellido'.$i,
                'email' => 's'.$i.'@email.com',
                'password' => $student_password,
                'url_image' =>  'img/user.jpg'
            ]);
            \App\Address\Address::create([
               'address' => 'Direccion'.$i,
               'user_id' => $user_s->id,
               'parish_id' => rand(1,1000)
            ]);
            $user_s->assignRole('Estudiante');
            $student = \App\Student::create([
                'user_id'=>$user_s->id,
                'name'=>$user_s->name,
                'last_name'=>$user_s->last_name,
                'url_image'=> $user_s->url_image,
                'email'=> $user_s->email,
                'dni'=> substr(str_shuffle($permitted_chars), 0, 9),
                'passport' => substr(str_shuffle($permitted_chars), 0, 9),
                'instruction' => 'Instruccion'.$i,
                'marital_status' => 'Soltero',
                'birth_date' => '1999-01-01',
                'phone'=> substr(str_shuffle($permitted_chars), 0, 9),
            ]);
        }

    }
}
