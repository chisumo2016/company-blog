# SPATIE ROLES AND PERMISSION (ACL)
        cdlcell.com Hadayat Niazi
    
    - Installation ond spatie and permission package 
            https://spatie.be/docs/laravel-permission/v6/installation-laravel

            composer require spatie/laravel-permission
            php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
            php artisan optimize:clear
            php artisan migrate

            - Add the necessary trait to your User model:
                    use HasRoles;

    - Create Role Using Spatie
        https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage

    - Add the middleware
            https://spatie.be/docs/laravel-permission/v6/basic-usage/middleware

    - bootstrap/app.php

             ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })

        1: ROLE CRUD UI
            No need to create the Role Model
            $role = Role::create(['name' => 'writer']);

    - Create Permission and Load All Permission from databases
        PERMISSION CRUD UI
            $role = Role::create(['name' => 'writer']);

       NB: IF YOU DON'T HAVE MULTIPLE ROLES , YOU CAN ASSIGN THE PERMISSION DIRECTLY TO A USER,
        YOU CAN ASSIGN THOSE PERMISSION DIRETLY TO USER

        THEY TWO WAY'S TO IMPLEMENT THOSE PERMISSION TO A USER 

    - Assign Direct Permission to a User using Spatie Package

            php artisan db:seed

            Route::get('assign-permission-to-user', function(){
            $user = User::find(2);

            $permission = Permission::findByName ('edit-articles');

            $user->givePermissionTo($permission);

            dd('Permission granted');
            
           
        });

        Open the databases , you can see  model_has_permission  , model means User

        You can store multiple permission
            
        How to get those permission from user ?
            https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage
                Route::get('assign-permission-to-user', function(){
            $user = User::find(2);

            $permission = Permission::findByName ('edit-articles');

           $permissions = $user->permissions;

        });

        You can remove those permissions
                https://spatie.be/docs/laravel-permission/v6/basic-usage/direct-permissions

        Route::get('assign-permission-to-user', function(){
            $user = User::find(2);

            $permission = Permission::findByName ('edit-articles');
            
            $permissions = $user->getPermissionNames ();

            $user->revokePermissionTo($permission);
            
        });

    - Assign Direct Permission to Role and Assign that Role to User

            Route::get('assign-permission-to-user', function(){
            //======== Assign permission to role =======/
            $user = User::find(2);

            $permission = Permission::findByName ('edit-articles');
            $role       = Role::findByName ('editor');
            $role->givePermissionTo($permission);

            dd('assign permission to user');

        });
    
            role_has_permission
            permission_id   role_id
                3                1


        You can assign multiple
            Route::get('assign-permission-to-user', function(){
            //======== Assign permission to role =======/
            $user = User::find(2);

            $permissions = Permission::all();
            $permissions = Permission::where('name', '!=' , 'show articles')->get();
            $role       = Role::findByName ('editor');

            $role->synPermissions($permissions);

            dd('assign permission to user');

        });

        sync removing the existing value and add new value

        

            
    - Assign Role to User using Spatie Laravel Permission 
             Route::get('assign-permission-to-user', function(){
            $user = User::find(2);

            $role       = Role::findByName ('editor');

            $user->assignRole('$role');

            dd('assigned');

        });

        model_has_role = rensipponsible to users
            role_id  model_tye               model_id
                1      App/Model\User\  2

        Route::get('assign-permission-to-user', function(){
            // check the user permission through role
            $user = User::find(1);

            $permissions = $user->getAllPermissions();

        });


# REAL PRACTICAL - SPATIE PACKAGE
    https://www.alpinetoolbox.com/
    https://play.tailwindcss.com/
    - Create Admin User 
    Seed for role 
    Seed for user 
    Attach role to user 
        php artisan make:seeder RoleSeeder
        php artisan make:seeder AdminSeeder

    php artisan db:seed --class=DemoDataSeeder

# CREATE THE ADMIN UI 
        https://github.com/tonyxhepa/laravel-permission
        php artisan make:controller Backend/RoleController -r
        php artisan make:controller Backend/PermissionController -r

# DISPLAY THE ROLES IN INDEX PAGE UI
# DISPLAY THE PERMISSIONS IN INDEX PAGE UI

# CREATE THE ROLES UI PAGE
        php artisan make:request StoreRoleRequest

# CREATE THE PERMISSIONS  UI PAGE
        php artisan make:request StorePermissionRequest

# UPDATE SPATIE ROLES AND PERMISSIONS
    Load the edit page and add functionality for update both models
    I dont want to update the admin role , we need to hide it .
            https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage
            $allRolesExceptAandB = Role::whereNotIn('name', ['role A', 'role B'])->get();

        eg $roles =  Role::whereNotIn('name', ['admin'])->get();

# DELETE ROLES AND PERMISSIONS 

# ASSIGN PERMISSION TO ROLE 
        ROLE MODEL 
        https://spatie.be/docs/laravel-permission/v6/basic-usage/role-permissions
        it happen in edit  role form , when a user click edit , the populated form will be displayed
            user will select permission and assign to it
        givePermissions
            $role->givePermissionTo('edit articles');
        Display all the permission on edit page
        Make a form to remove those permissions on ui
        Make web route to display the permission and logic inside the Role controller
        Make  logic inside the Role controller to  remove/revoking

# ASSIGN ROLES TO PERMISSIONS 
        PERMISSION MODEL
    Display all the roles which PERMISSION has and assign new ROLE

    

