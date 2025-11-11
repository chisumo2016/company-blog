<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Title;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function GetSlider()
    {
        $slider = Slider::find(1);

        //dd($slider);

        return view('admin.backend.sliders.get_slider', compact('slider'));
    }

    public function updateSlider(Request $request)
    {
        $slider_id = $request->id;

        $slider = Slider::find($slider_id);

        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306, 618)->save(public_path('upload/sliders/') . $name_generate);
            $save_url = 'upload/sliders/' . $name_generate;

            /*Remove the existing image*/

            if (file_exists(public_path($slider->photo))) {
                unlink(public_path($slider->photo));
            }

            // ✅ Update testimonial using validated request data
            Slider::find($slider_id)->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Slider Updated with Image Successfully'
            ];

            return redirect()->back()->with($notification);

        } else {

            // Slider::find(1)->update([]);
            Slider::find($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Slider Updated without Image Successfully'
            ];

            return redirect()->back()->with($notification);
        }

    }

    public function editSlider(Request $request , $id)
    {
        $slider = Slider::findOrFail($id);

        if ($request->has('title')) {
            $slider->title = $request->title;
        }

        if ($request->has('description')) {
            $slider->description = $request->description;
        }

        $slider->save();

        return response()->json(['success' => true]);
    }

    public function editFeature(Request $request , $id)
    {
        $title = Title::findOrFail($id);

        if ($request->has('features')) {
            $title->features = $request->features;
        }

        $title->save();

        return response()->json(['success' => true]);
    }

    public function editReview(Request $request , $id)
    {
        $title = Title::findOrFail($id);

        if ($request->has('reviews')) {
            $title->reviews = $request->reviews;
        }

        $title->save();

        return response()->json(['success' => true]);
    }


    public function editAnswer(Request $request , $id)
    {
        $title = Title::findOrFail($id);

        if ($request->has('answers')) {
            $title->answers = $request->answers;
        }

        $title->save();

        return response()->json(['success' => true]);
    }


}
