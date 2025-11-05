# BLOG SETUP
    
# INSTALL BREEZE IN LARAVEL 12 
    BY Default
    https://laravel.com/docs/11.x/starter-kits#laravel-breeze
        composer require laravel/breeze --dev  user1234
        php artisan breeze:install

            php artisan migrate:fresh
            npm install
            npm run dev

         php artisan route:list

# SETUP FORGOT PASSWORD
    To setup forgot password , required 
            Mail services
                e.g Mailtrap
    Configure the env file
    Test the reset password

# BACKEND DASHBOARD SETUP
    Gonna user Theme
    To change  the default dashboard to customs  dashboard (Bootstrap 5)
       assests
    Links the all css {{ asset('backend')}}
    Segment most part of our admin dashboard
            
        Sidebar  - Same
        Header   - Same
        Main  - Dynamic
        Footer   - Same

    php artisan optimize

# LOGOUT FUNCTIONALITY (ADMIN SIDE)
        php artisan make:controller AdminController
             Http/Controllers/Auth/AuthenticatedSessionController.php
        Copy the code and paste into new controller
        Add the admin url in web route
        Add the route name in header file

# CUSTOMIZE  THE LOGIN PAGE
    Customize the login page to our own  from breeze.
    Change the login page from breeze - Theme
        resources/views/auth/login.blade.php
    Copy from old page and add into new page

# REGISTER PAGE
        Customize the REGISTER page to our own  from breeze.
    Change the REGISTER page from breeze - Theme
        resources/views/auth/register.blade.php
    Copy from old page and add into new page
    

# SHOWING ERROR MESSAGE
    Error validation 
        @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror

# CLEAN THE DASHBOARD
    dashboard to be clean
        Header
        Sidebar
        Main
        Footer

#  TWO FACTOR AUTHENTIFICATION
    In Login 
        email and password - > the system will send  2FA email will be sent to mailtrap 
    How to setup 
        resources/views/auth/login.blade.php
                 <form method="POST"  action="{{ route('login') }}" class="my-4">
                 <form method="POST"  action="{{ route('admin.login') }}" class="my-4">

    php artisan make:mail VerificationCodeMail
        The all process to implement the 2FA with Laravel 12
                    modified:   app/Http/Controllers/AdminController.php
                    modified:   blog.md
                    modified:   resources/views/admin/index.blade.php
                    modified:   resources/views/admin/partials/_footer.blade.php
                    modified:   resources/views/admin/partials/_header.blade.php
                    modified:   resources/views/admin/partials/_sidebar.blade.php
                    modified:   resources/views/auth/login.blade.php
                    modified:   routes/web.php


                     app/Mail/
                    resources/views/auth/verify.blade.php
                    resources/views/email/

















    
    
