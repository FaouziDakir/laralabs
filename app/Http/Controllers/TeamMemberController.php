<?php

namespace App\Http\Controllers;

use App\TeamMember;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use Storage;

class TeamMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = TeamMember::all();

        return view('team', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'teamrole' => 'required|min:3',
            'teamimage' => 'image|required'
            
        ]);

        
        $attributes = $this->uploadImage($attributes);

        TeamMember::create($attributes);
        
        return redirect('/admin/team');
    }


    public function show(TeamMember $teamMember)
    {
        return view('teammember', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        if (request()->has('completed')) {

            $main = false;
            TeamMember::where('main',1)->update(compact('main'));
            $teamMember->main();

        } else {

            $teamMember->notMain();
            
        }

        if(TeamMember::where('main',1)->get()->count() == 0){

            TeamMember::all()->first()->update(['main' => true]);
            
        }
    

        return back();
    }

    public function updateTeamMember(TeamMember $teamMember)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'teamrole' => 'required|min:3',
            'teamimage' => 'image'
            
        ]);

        if(request('teamimage')){
            Storage::delete('\public\uploads\\'.$teamMember->teamimage);
        }

        $attributes = $this->uploadImage($attributes);

        $teamMember->update($attributes);
        
        return redirect('/admin/team');
    }

    public function uploadImage($attributes)
    {
        if(request()->hasFile('teamimage')){
            $image = request()->file('teamimage');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $path = 'app\public\uploads\\';

            Image::make($image)->save( storage_path($path . $filename ) );

            $attributes['teamimage'] = $filename;
          };

          return $attributes;
    }

    public function destroy(TeamMember $teamMember)
    {
        if(TeamMember::all()->count() <= 3){

            return back()->with('error', 'Impossible de supprimer un des 3 derniers membres');

        } else {
            Storage::delete('\public\uploads\\'.$teamMember->teamimage);

            $teamMember->delete();

            return redirect('/admin/team');
        }
    }
}
