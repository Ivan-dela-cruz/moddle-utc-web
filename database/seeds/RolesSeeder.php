    <?php

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
            Permission::create(['name' => 'read_role',  'modulo' => 'Roles', 'alias' => 'Leer']);
            Permission::create(['name' => 'update_role',  'modulo' => 'Roles', 'alias' => 'Modificar']);
            Permission::create(['name' => 'destroy_role',  'modulo' => 'Roles', 'alias' => 'Eliminar']);

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

    //permisos para el crud de los period
            Permission::create(['name' => 'create_period', 'modulo' => 'Periodos', 'alias' => 'Crear']);
            Permission::create(['name' => 'read_period', 'modulo' => 'Periodos', 'alias' => 'Leer']);
            Permission::create(['name' => 'update_period', 'modulo' => 'Periodos', 'alias' => 'Modificar']);
            Permission::create(['name' => 'destroy_period', 'modulo' => 'Periodos', 'alias' => 'Eliminar']);

            /// cramos los roles para que son admin, propietario, secretaria, medico
            $role = Role::create(['name' => 'Administrador', 'description'=>'Rol de administrador','status' => true]);

            //asignacion de los permisos al rol admin
            $role->givePermissionTo(Permission::all());

            $role = Role::create(['name' => 'Estudiante','description'=>'Rol de estudiante', 'status' => true]);
            $role = Role::create(['name' => 'Profesor','description'=>'Rol de profesor', 'status' => true]);


            ///crearmos el usario por defecto
            $user_password = Hash::make('root1234');
            $user = User::create([
                
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => $user_password,
                
                ]

            );

            $user->assignRole('Administrador');
        }
    }
