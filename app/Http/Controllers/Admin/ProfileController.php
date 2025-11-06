<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        /**Authenticated user */

        $id = Auth::user()->id;

        $profileData = User::find($id);

        return view('admin.profile.admin_profile',compact('profileData'));
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $oldPhotoPath = $data->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            /*generate name*/
            $filename = time() . '.' . $file->getClientOriginalExtension(); // 33333.png
            $file->move(public_path('upload/user_images'), $filename); // $file->move('uploads/user_images/', $filename);
            $data->photo = $filename;

            /*remove the oldImage*/
            if ($oldPhotoPath && $oldPhotoPath  != $filename) {
                $this->deleteOldImage( $oldPhotoPath);
            }
        }

        /*save*/
        $data->save();

        /*Notification Message*/
        $notification = array(
            'message'   => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    private function deleteOldImage(string $oldPhotoPath) : void
    {
        $fullPath = public_path('upload/user_images/' . $oldPhotoPath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
