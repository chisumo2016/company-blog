#  HOME PAGE / FRONDEND THEME SETUP . 
    Intergrate the front end theme with boostrap 5
    Login and Register has been done on previous chapter 
    Load theme into laravel front end .
    Load in home page
    Segmentation of layouts
        Header
        Footer
        Mobile
    updte the assests css link
    updte the  assests js link

    php artisan optimize
    Make the index page as dynamic by segment each parts 
    Update all images
     Update the header
    When user isnt login - login button will be dipslay
    When user is logged in - Dasboard  will be dipslayed
    User will be  able to update the information in front end after logged in
        @auth()
                        <div class="lonyo-header-info-content">
                            <ul>
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="lonyo-header-info-content">
                            <ul>
                                <li><a href="{{ route('login') }}">Log in</a></li>
                            </ul>
                        </div>
          @endauth
