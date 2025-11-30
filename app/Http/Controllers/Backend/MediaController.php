<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $photos = Media::all();

        return view('admin.backend.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.backend.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file'); //thumbnail
        $name = time() . $file->getClientOriginalName();
        $file->move('media', $name);//$file->move(public_path('media/images'), $name);

        Media::create(['file' => $name]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Media Created Successfully'
        ];
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        unlink(public_path('media/' . $media->file));

        $media->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Media Deleted Successfully'
        ];
        return redirect()->back()->with($notification);


    }
}
