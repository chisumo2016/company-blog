# SETUP ADMIN PROFILE  - MY ACCOUNT
\
    Login user will be able to change the password
    Login user will be able to update the profile

    Create a route in header admin
            <a href="{{ route('admin.profile') }}"

    Create a Controller
            php artisan make:controller Admin/ProfileController

    php artisan optimize
    
    Let use javascript to display an images  once you selected .
             <script type="text/javascript">
                $(document).ready(function () {
                    $('#image').change(function (event) {
                        var reader = new FileReader();
                        reader.onload = function (event) {
                            $('#showImage') . attr('src' , event.target.result);
        
                        }
                        reader.readAsDataURL(event.target.files['0']);
                    })
                })
            </script>
    - Add logic into controller
    - Load toastr message
    - Update the header information as well
    
    
