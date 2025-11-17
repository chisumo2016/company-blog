<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FinanceController extends Controller
{
    public function getFinance()
    {
        $finance = Finance::find(1);

        //dd($slider);

        return view('admin.backend.finances.get_finance', compact('finance'));
    }

    public function updateFinance(Request $request)
    {
        $finance_id = $request->id;

        $finance = Finance::find($finance_id);

        /**Handle image upload if provided with Image Intervention*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(302, 618)->save(public_path('upload/finances/') . $name_generate);
            $save_url = 'upload/finances/' . $name_generate;

            /*Remove the existing image*/
            if (file_exists(public_path($finance->photo))) {
                // dd(public_path($clarify->photo));
                @unlink(public_path($finance->photo));
            }


            // ✅ Update testimonial using validated request data
            Finance::find($finance_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Finances Updated with Image Successfully'
            ];

            return redirect()->back()->with($notification);

        } else {

            // Slider::find(1)->update([]);
            Finance::find($finance_id)->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Finances Updated without Image Successfully'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editFinance(Request $request , $id)
    {
        $finance = Finance::findOrFail($id);

        if ($request->has('title')) {
            $finance->title = $request->title;
        }

        if ($request->has('description')) {
            $finance->description = $request->description;
        }

        $finance->save();

        return response()->json(['success' => true]);
    }
}
