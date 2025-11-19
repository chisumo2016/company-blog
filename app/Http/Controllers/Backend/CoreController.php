<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoreRequest;
use App\Http\Requests\UpdateCoreRequest;
use App\Models\Core;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cores = Core::latest()->get();

        return view('admin.backend.cores.index', compact('cores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.cores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoreRequest $request)
    {
        $validated = $request->validated();

        Core::create($validated);


        $notification = [
            'alert-type' => 'success',
            'message' => 'Core Values Created Successfully'
        ];

        return redirect()->route('cores.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Core $core)
    {
        return view('admin.backend.cores.edit', compact('core'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoreRequest $request, Core $core)
    {
        $validated = $request->validated();

        $core->update($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Core Values Updated Successfully'
        ];

        return redirect()->route('cores.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Core $core)
    {
        $core->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Core Values Deleted Successfully'

        ];

        return redirect()->route('cores.index')->with($notification);
    }
}
