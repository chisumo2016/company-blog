# POST SECTION SETUP
    - Add link on admin side bar
        php artisan make:model Post -mf
        php artisan make:controller Backend/PostController -r
        php artisan make:request UpdatePostRequest
        php artisan make:request StorePostRequest
        php artisan migrate
    Create the relationship Post and Category
         Category is related to Post
            Post belongs to Category

#  SHOW BLOG POST IN FRONT END 
        
        
