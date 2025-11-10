# Home Review / Testimonial Section Setup |
    Dynamic this parts
    CRUD - from backend 
    Make migration , model , controller
        php artisan make:controller Backend/TestimonialController -r
        php artisan make:model Testimonial -m
        php artisan migrate
    Create the Data
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('/testimonials', 'index')->name('testimonials.index');
        });
    Load data table

    Intervation Image with appropiate size
        https://image.intervention.io/v3
            composer require intervention/image
    extension - gd
        
        Code to upload Image

                /**Image Upload*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(60, 60)->save(public_path('upload/testimonials/') . $name_generate);
            $save_url = 'upload/testimonials/' . $name_generate;

            Testimonial::create([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'photo' => $save_url,

            ]);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Testimonial Created Successfully'
        ];

        return redirect()->route('testimonials.index')->with($notification);


    php artisan make:request StoreTestimonialRequest
    php artisan make:request UpdateTestimonialRequest



























