<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = Role::all();

        $permissions = Permission::all();

        return view('admin.backend.users.role', compact('user', 'roles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {

           $notification = [
                'alert-type' => 'success',
                'message' => 'You are not allowed to delete user! He/She already has an admin role!'
            ];
            return redirect()->back()->with($notification);
        }

        $user->delete();

        $notification = [
            'alert-type' => 'success',
            'message'    => 'User has been deleted successfully!'

        ];

        return redirect()->back()->with($notification);

    }

    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){

            $notification = [
                'alert-type' => 'success',
                'message' => 'Role Already exist'

            ];
            return redirect()->back()->with($notification);
        }
        //assign role
        $user->assignRole($request->role);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role assign Successfully'

        ];
        return redirect()->back()->with($notification);
    }

    public  function  removeRole(User $user, Role $role)
    {

        if($user->hasRole($role)){
            $user->removeRole($role);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Roles Removed Successfully'

            ];
            return redirect()->back()->with($notification);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role not exists'

        ];
        return redirect()->back()->with($notification);
    }

    public function givePermission(Request $request , User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {

            $notification = [
                'alert-type' => 'success',
                'message' => 'Permission Already Assigned to Role'

            ];
            return redirect()->back()->with($notification);
        }

        $user->givePermissionTo($request->permission);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Added Successfully'

        ];
        return redirect()->back()->with($notification);
    }

    public function removePermission(User $user , Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {

            $user->revokePermissionTo($permission);

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
