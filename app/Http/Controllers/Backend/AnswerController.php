<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::latest()->get();

        return view('admin.backend.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.answers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnswerRequest $request)
    {
        $validated = $request->validated();

        Answer::create($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Answer Created Successfully'
        ];

        return redirect()->route('answers.index')->with($notification);




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
    public function edit(Answer $answer)
    {
        return view('admin.backend.answers.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $validated = $request->validated();

        $answer->update($validated);


        $notification = [
            'alert-type' => 'success',
            'message' => 'Answer Updated Successfully'
        ];

        return redirect()->route('answers.index')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Answers Deleted Successfully'

        ];

        return redirect()->route('answers.index')->with($notification);

    }
}
