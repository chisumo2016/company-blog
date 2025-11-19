<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AboutController extends Controller
{
    public function aboutUs()
    {
        $about = About::find(1);

        return view('admin.backend.about.get_about' , compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about_id = $request->id;

        $about = About::find($about_id);

        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(526, 550)->save(public_path('upload/aboutUs/') . $name_generate);
            $save_url = 'upload/aboutUs/' . $name_generate;

            /*Remove the existing image*/


            if (file_exists(public_path($about->photo))) {
                @unlink(public_path($about->photo));
            }

            // ✅ Update testimonial using validated request data
            About::find($about_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'About US  Updated with Image Successfully'
            ];

            return redirect()->back()->with($notification);

        } else {

            // Slider::find(1)->update([]);
            About::find($about_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'About Us Updated without Image Successfully'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
