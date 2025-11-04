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























    
    
