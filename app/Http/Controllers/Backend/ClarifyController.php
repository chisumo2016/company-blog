<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clarify;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ClarifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getClarify()
    {

        $clarify = Clarify::find(1);

        //dd($slider);

        return view('admin.backend.clarifies.get_clarify', compact('clarify'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateClarify(Request $request)
    {
        $clarify_id = $request->id;

        $clarify = Clarify::find($clarify_id);

        /**Handle image upload if provided with Image Intervention*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(302, 618)->save(public_path('upload/clarifies/') . $name_generate);
            $save_url = 'upload/clarifies/' . $name_generate;

            /*Remove the existing image*/
            if (file_exists(public_path($clarify->photo))) {
               // dd(public_path($clarify->photo));
                @unlink(public_path($clarify->photo));
            }


            // ✅ Update testimonial using validated request data
            Clarify::find($clarify_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Clarifies Updated with Image Successfully'
            ];

            return redirect()->back()->with($notification);

        } else {

            // Slider::find(1)->update([]);
            Clarify::find($clarify_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Clarifies Updated without Image Successfully'
            ];

            return redirect()->back()->with($notification);
        }

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
