# ROUTE 
   1: 
       Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {{
    
        }});

        Route::prefix('admin')->name('admin.')->group(function () {

        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::middleware(['guest:admin'])->group(function () {
                
            });
        });

# YIELD
    @yield('PageTitle')

    @section('PageTitle', isset($pageTitle) ? $pageTitle : 'Page Tithe Here')
        
    @stack('stylesheets)
    @stack('scripts)

        database/migrations/0001_01_01_000000_create_users_table.php
        modified:   resources/views/home/index.blade.php
        modified:   routes/web.php
