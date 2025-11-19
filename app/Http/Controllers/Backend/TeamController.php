<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Models\App;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->get();

        return view('admin.backend.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        //dd($request->all());
        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306,400)->save(public_path('upload/teams/') . $name_generate);
            $save_url = 'upload/teams/' . $name_generate;

            // ✅ Create testimonial using validated request data
            Team::create([
                'name' => $request->name,
                'position' => $request->position,

                'photo' => $save_url,

            ]);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Team Created Successfully'
        ];

        return redirect()->route('teams.index')->with($notification);
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
    public function edit(Team $team)
    {
        return view('admin.backend.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        /**Handle image upload if provided*/
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            /*Unique name*/
            $name_generate = hexdec(uniqid())  . '.' . $image->getClientOriginalExtension(); //uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(60,60)->save(public_path('upload/teams/') . $name_generate);
            $save_url = 'upload/teams/' . $name_generate;

            // ✅ Update testimonial using validated request data
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'photo' => $save_url,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Team Updated with Image Successfully'
            ];

            return redirect()->route('teams.index')->with($notification);
        }else {
            $team->update([
                'name' => $request->name,
                'position' => $request->position,

            ]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Team Updated without Image Successfully'
            ];

            return redirect()->route('teams.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //dd($testimonial);

        // ✅ Delete the image file safely if it exists
        if ($team->photo && file_exists(public_path($team->photo))) {
            unlink(public_path($team->photo));
        }

        // ✅ Delete the testimonial record from the database
        $team->delete();

        // ✅ Optional: success message
        $notification = [
            'alert-type' => 'success',
            'message' => 'Team Deleted Successfully',
        ];

        // ✅ Redirect back to index
        return redirect()->route('teams.index')->with($notification);
    }
}
