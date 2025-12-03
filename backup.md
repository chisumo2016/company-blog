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
