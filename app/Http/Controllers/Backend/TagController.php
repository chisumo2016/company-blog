<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.backend.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $validated = $request->validated();

        Tag::create($validated);

        $notification = [
            'alert-type' => 'success',
            'message'    => 'Tag Create Successfully',
        ];

        return redirect()->route('tags.index')->with($notification);

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
    public function edit(Tag $tag)
    {
        return view('admin.backend.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        $tag->update($validated);

        $notification = [
            'alert-type' => 'success',
            'message'    => 'Tag Updated Successfully',
        ];

        return redirect()->back()->with($notification);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        $notification = [
            'alert-type' => 'success',
            'message'    => 'Tag Deleted Successfully',
        ];

        return redirect()->route('tags.index')->with($notification);
    }
}
