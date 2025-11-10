<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.backend.testimonials.index' , compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(60,60)->save(public_path('upload/testimonials/') . $name_generate);
            $save_url = 'upload/testimonials/' . $name_generate;

            // ✅ Create testimonial using validated request data
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
       //dd($testimonial);
        return view('admin.backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(60,60)->save(public_path('upload/testimonials/') . $name_generate);
            $save_url = 'upload/testimonials/' . $name_generate;

            // ✅ Update testimonial using validated request data
            $testimonial->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Testimonial Updated with Image Successfully'
            ];

            return redirect()->route('testimonials.index')->with($notification);
        }else{
            $testimonial->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Testimonial Updated without Image Successfully'
            ];

            return redirect()->route('testimonials.index')->with($notification);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //dd($testimonial);

        // ✅ Delete the image file safely if it exists
        if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
            unlink(public_path($testimonial->photo));
        }

        // ✅ Delete the testimonial record from the database
        $testimonial->delete();

        // ✅ Optional: success message
        $notification = [
            'alert-type' => 'success',
            'message' => 'Testimonial Deleted Successfully',
        ];

        // ✅ Redirect back to index
        return redirect()->route('testimonials.index')->with($notification);
    }
}
