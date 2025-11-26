<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\updatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        $validated = $request->validated();

        Permission::create($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Created Successfully'

        ];
        return redirect()
            ->route('permissions.index')
            ->with($notification);
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
    public function edit(Permission $permission)
    {
        return view('admin.backend.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( updatePermissionRequest $request, Permission $permission)
    {
        $validated = $request->validated();

        $permission->update($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Update Successfully'

        ];
        return redirect()
            ->route('permissions.index')
            ->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
