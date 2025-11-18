# Backend NEW  Section - Update from front end 
    No multiple data will be inserted .Only one data
    We're going to use the front end to update the application
    The information will be updated the database
        title
        description
        image
    
        php artisan make:model App -m
        php artisan make:controller Backend/AppController
        php artisan make:request StoreAppRequest
        php artisan migrate

    1: We will update our image
    2:we will update our description,image
        
    

    Make web route 
    Display in UI
