<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('admin.backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']); // OR $data['slug'] = strtolower((str_replace(' ', '-', $request->name)));

        Category::create($data);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Created Successfully'
        ];

        return redirect()->route('categories.index')->with($notification);


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return response()->json($category);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request)
    {

        $data = $request->validated();


        // Find category manually, because ID comes from modal form
        $category = Category::findOrFail($request->cat_id);

        // update slug if name changes
        $data['slug'] = Str::slug($data['name']);

        $category->update($data);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Updated Successfully'
        ];

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Deleted Successfully'

        ];

        return redirect()->route('categories.index')->with($notification);
    }
}
