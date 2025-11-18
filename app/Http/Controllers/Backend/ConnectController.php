<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConnectRequest;
use App\Http\Requests\UpdateConnectRequest;
use App\Models\Connect;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $connects = Connect::latest()->get();

        return view('admin.backend.connects.index', compact('connects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.connects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConnectRequest $request)
    {
        $validated = $request->validated();

        Connect::create($validated);


        $notification = [
            'alert-type' => 'success',
            'message' => 'Connect Created Successfully'
        ];

        return redirect()->route('connects.index')->with($notification);
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
    public function edit(connect $connect)
    {
        return view('admin.backend.connects.edit', compact('connect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConnectRequest $request, connect $connect)
    {
        $validated = $request->validated();

        $connect->update($validated);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Connect Updated Successfully'
        ];

        return redirect()->route('connects.index')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connect $connect)
    {
        $connect->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Connects Deleted Successfully'

        ];

        return redirect()->route('connects.index')->with($notification);
    }

    public function updateConnect(Request $request ,$id)
    {
        $connect = Connect::findOrFail($id) ;

        $connect->update($request->only(['title','description']));

        return response()->json([
            'success' => true,
            'message' => 'Connect Updated Successfully'
        ]);
    }
}
