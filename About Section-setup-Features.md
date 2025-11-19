# ABOUT  SECTION SETUP
        CRUD SECTION
    - Load this About Page 
    - Out  the middlware ,

        php artisan make:model Team -m
        php artisan make:model Core -m
        php artisan make:model About -m
        php artisan make:controller Backend/TeamController -r
        php artisan make:controller Backend/CoreController -r
        php artisan make:controller Client/AboutController
        php artisan make:request StoreCoreRequest
        php artisan make:request StoreTeamRequest
        php artisan optimize
        php artisan migrate
    Create Team Page to load the index displaying page
    Create the Team Controller in front end
    Use Javascript to validated 

    In About Model , upload from front end  .No CRUD 
    Editor plugin
    php artisan make:controller Backend/AboutController
