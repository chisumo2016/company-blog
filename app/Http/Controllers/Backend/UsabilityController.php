<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clarify;
use App\Models\Usability;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use JetBrains\PhpStorm\NoReturn;

class UsabilityController extends Controller
{
    public function getUsability()
    {
        $usability = Usability::find(1);

        //dd($slider);

        return view('admin.backend.usability.get_usability', compact('usability'));
    }

    #[NoReturn]
    public function updateUsability(Request $request)
    {
        //dd($request->all());
        $usability_id = $request->id;  //hidden id

        $usability = Usability::find($usability_id);

        /**Handle image upload if provided with Image Intervention*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(506, 400)->save(public_path('upload/usability/') . $name_generate);
            $save_url = 'upload/usability/' . $name_generate;

            /*Remove the existing image*/
            if (file_exists(public_path($usability->photo))) {
                // dd(public_path($clarify->photo));
                @unlink(public_path($usability->photo));
            }


            // ✅ Update testimonial using validated request data
            Usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Usability Updated with Image Successfully'
            ];

            return redirect()->back()->with($notification);

        } else {

            // Slider::find(1)->update([]);
            Usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link,


            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Usability Updated without Image Successfully'
            ];

            return redirect()->back()->with($notification);
        }

    }

}
