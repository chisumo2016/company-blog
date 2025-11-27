<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\updateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles =  Role::whereNotIn('name', ['admin'])->get();

        return view('admin.backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated();

        Role::create($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role Created Successfully'

        ];
        return redirect()->route('roles.index')->with($notification);
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.backend.roles.edit', compact('role' , 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRoleRequest $request, Role $role)
    {
        $validated = $request->validated();

        $role->update($validated);

       $notification = [
            'alert-type' => 'success',
            'message' => 'Role Update Successfully'

        ];
        return redirect()->route('roles.index')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Role $role)
    {
        $role->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role Deleted Successfully'

        ];
        return redirect()->route('roles.index')->with($notification);

    }
    public function givePermission(Request $request , Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {

            $notification = [
                'alert-type' => 'success',
                'message' => 'Permission Already Assigned to Role'

            ];
            return redirect()->back()->with($notification);
        }

        $role->givePermissionTo($request->permission);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Added Successfully'

        ];
        return redirect()->back()->with($notification);
    }

    public function revokePermission(Role $role , Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {

            $role->revokePermissionTo($permission);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Permission Revoked Successfully'

            ];
            return redirect()->back()->with($notification);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission not exists'

        ];
        return redirect()->back()->with($notification);


    }
}
