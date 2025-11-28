# AUTHORIZATION
    Relationship for job and User

# INLINE AUTHORIZATION STEP 1
# GATE  STEP 2

            public function edit(Job $job)
            {
                Gate::define('put any thing', function ($user, $job) {
                    /*Return Boolean where this user is authenticated **/
                    return $job->employer->user->is($user);
                });
            }

            public function edit(Job $job)
            {
                Gate::define('edit-job', function ($user, $job) {
                    /*Return Boolean where this user is authenticated **/
                    return $job->employer->user->is($user);
                });
                
                if (Ath::guest()){
                    return redirect('/login');
                }
                
                Gate::authorize('edit-job', $job);
                Gate::allow('edit-job', $job);
                Gate::denies('edit-job', $job);
            }

            Authorize logic will run associated with the name 

# APP SERVICE PROVIDER - STEP 3  

    Define Gates Inside AppServiceProvider
    Reference to the application
            public function boot(): void
            {
                Gate::define('edit-job', function (User $user, $job) {
                    /*Return Boolean where this user is authenticated **/
                    return $job->employer->user->is($user);
                });
            }

    $user variable represent the current authenticated user .

    Sometimes u can be a guest , it will trigger the logic if urnot signed in .
              public function boot(): void
                {
                    Gate::define('edit-job', function (?User $user, $job) {
                        /*Return Boolean where this user is authenticated **/
                        return $job->employer->user->is($user);
                    });
                }

    in Controlller will be like this 

                public function edit(Job $job)
                    {
                        Gate::authorize('edit-job', $job);
                        
                        return view('jobs.edit', compact('job'));
                    }
                }
# CAN , CAN , CAN  STEP 4
    In controller 

            public function edit(Job $job)
                {
                   Gate::authorize('edit-job', $job);
            
                    return view('jobs.edit', compact('job'));
                }
              public function edit(Job $job)
                {
                   auth::user()->can('reference the name of gates ', $job); 
                   auth::user()->cannot('update', $job); 
                    return view('jobs.edit', compact('job'));
                }

    Apply in blade file, if the current user can edit the job please display the button
             @can('edit-roles', $role)
                <a href="{{ route('roles.edit', $role->id) }}"
                   class="btn btn-success btn-sm">Edit</a>
             @endcan

            public function edit(Job $job)
            {
               Gate::authorize('edit-job', $job);
        
                return view('jobs.edit', compact('job'));
            }
    This works but its a bit of repeatation , you need to put in each resources
        eg index, store, edit , update , show and delete
        
# MIDDLEWARE AUTHORIZATION
    You can perform authorization in route level .

          Route::resources([
                'testimonials'  => TestimonialController::class,
            ]);
    One down problem of kind of this resource 
        Route::resource('posts', PostController::class)->middlware('auth');
    it appply to every single routes 

    GOOGLE 
        https://laravel.com/docs/master/routing#named-routes
    
    To overcome the middlware to apply to all resources use 
        Route::resource('posts', PostController::class)->only(['index', 'show']);
        Route::resource('posts', PostController::class)->except(['index', 'show'])->middleware(['auth', 'verified']);

    Tailor doesnt like this idea, prefer single route declaration
    ->middleware(['signed' , 'permission to edit the job']);

    Route::get('posts/{job}/edit' , [PostController::class , 'edit'])->middleware(['auth' , 'can:edit-job ,job']);
    
    $job is wilcard passed to gates

    Inside the Job Controller to remove the gates
                public function edit(Job $job)
                {
                   Gate::authorize('edit-job', $job);
            
                    return view('jobs.edit', compact('job'));
                }


            TO 

            public function edit(Job $job)
            {
                return view('jobs.edit', compact('job'));
            }

    Blade level

         @can('edit-roles', $role)
            <a href="{{ route('roles.edit', $role->id) }}"
               class="btn btn-success btn-sm">Edit</a>
            @endcan

    MANY MANY PEOPLE THEY PREFER TO USE THE MIDDLEWARE IN ROUTE LEVEL.

    Let be smart 
        Route::get('posts/{job}/edit' , [PostController::class , 'edit'])->middleware('auth')->can('edit-job', 'job');
    
        Route::get('posts/{job}/edit' , [PostController::class , 'edit'])
        ->middleware('auth')
        ->can('edit-job','job');



# POLICIES 
    Policy are connected to aloquent models
       php artisan make:policy JobPolicy 

        class PostPolicy
        {
            public function edit(User $user , Post $post): bool
            {
                return $post->user->is($user);
            }
    }

    Route file in php

    Route::get('posts/{job}/edit' , [PostController::class , 'edit'])
    ->middleware('auth')
    ->can('edit','post');

    not
        ->can('method on policy','model');

    Blade level

         @can('edit', $post)
            <a href="{{ route('roles.edit', $role->id) }}"
               class="btn btn-success btn-sm">Edit</a>
            @endcan

    DECISION TIME , DO I PUT MY AUTHORIZATION IN CONTROLLER OR WEB ROUTES
    SIMPLE PROJECT , GATE FACEDES IS OK . PUT ALL GATE IN APP SERVICE PROVIDE AND CALL TO ANY PLACE IN APPLICATION .
    LARGE APPLICATION USER POLICIES .












        
























    






















