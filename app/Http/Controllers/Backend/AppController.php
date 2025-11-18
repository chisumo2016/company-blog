<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\App;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AppController extends Controller
{
    public function updateApp(Request $request, $id)
    {
        $app = App::findOrFail($id) ;

        $app->update($request->only(['title','description']));

        return response()->json([
            'success' => true,
            'message' => 'App Updated Successfully'
        ]);
    }

    public function updateAppImage(Request $request, $id)
    {
          $apps = App::findOrFail($id);

        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306,481)->save(public_path('upload/apps/') . $name_generate);
            $save_url = 'upload/apps/' . $name_generate;

            //remove existing image
            if (file_exists(public_path($apps->photo))) {
                @unlink(public_path($apps->photo));
            }
            //Update in database
            $apps->update([
                'photo' => $save_url,
            ]);

            return response()->json([
                'success' => true,
                'image_url' => asset($save_url),
                'message' => 'App Image Updated Successfully'
            ]);
        }

        return response()->json([
           'success' => false,
            'message' => 'App Image Not Updated'
        ],400);
    }
}
