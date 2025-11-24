<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $messages = \App\Models\Contact::latest()->get();

        return view('admin.backend.contact.message', compact('messages'));
    }

    public function destroy($id)
    {
        $delete = Contact::findOrFail($id);

        $delete->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Message  Deleted Successfully'

        ];

        return redirect()->back()->with($notification);
    }
}
