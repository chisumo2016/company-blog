<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Answer;
use App\Models\App;
use App\Models\Contact;
use App\Models\Title;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $answers = Answer::latest()->get();

        $app = App::find(1);

        $title = Title::find(1);

        return view('home.pages.contact.contact-us', compact('app', 'title', 'answers'));
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create($request->validated());

        $notification = [
            'alert-type' => 'success',
            'message' => 'Message has been sent Successfully'
        ];

        return redirect()->back()->with($notification);

    }
}
