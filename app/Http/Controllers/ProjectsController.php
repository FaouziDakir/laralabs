<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

use Intervention\Image\Facades\Image;
use Storage;

class ProjectsController extends Controller
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
    public function index(Projects $projects)
    {
        $projects = Projects::all();

        $icons = [
            'flaticon-001-picture',
            'flaticon-002-caliper',
            'flaticon-003-energy-drink',
            'flaticon-004-build',
            'flaticon-005-thinking-1',
            'flaticon-006-prism',
            'flaticon-007-paint',
            'flaticon-008-team',
            'flaticon-009-idea-3',
            'flaticon-010-diamond',
            'flaticon-011-compass',
            'flaticon-012-cube',
            'flaticon-013-puzzle',
            'flaticon-014-magic-wand',
            'flaticon-015-book',
            'flaticon-016-vision',
            'flaticon-017-notebook',
            'flaticon-018-laptop-1',
            'flaticon-019-coffee-cup',
            'flaticon-020-creativity',
            'flaticon-021-thinking',
            'flaticon-022-branding',
            'flaticon-023-flask',
            'flaticon-024-idea-2',
            'flaticon-025-imagination',
            'flaticon-026-search',
            'flaticon-027-monitor',
            'flaticon-028-idea-1',
            'flaticon-029-sketchbook',
            'flaticon-030-computer',
            'flaticon-031-scheme',
            'flaticon-032-explorer',
            'flaticon-033-museum',
            'flaticon-034-cactus',
            'flaticon-035-smartphone',
            'flaticon-036-brainstorming',
            'flaticon-037-idea',
            'flaticon-038-graphic-tool-1',
            'flaticon-039-vector',
            'flaticon-040-rgb',
            'flaticon-041-graphic-tool',
            'flaticon-042-typography',
            'flaticon-043-sketch',
            'flaticon-044-paint-bucket',
            'flaticon-045-video-player',
            'flaticon-046-laptop',
            'flaticon-047-artificial-intelligence',
            'flaticon-048-abstract',
            'flaticon-049-projector',
            'flaticon-050-satellite',
        ];
        
        return view('projects', compact('projects', 'icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Projects $projects)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'message' => 'required|min:3',
            'image' => 'image|required',
            'icone' => 'required'
            
        ]);
        
        $attributes = $this->uploadImage($attributes);

        Projects::create($attributes);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $project)
    {
        $icons = [
            'flaticon-001-picture',
            'flaticon-002-caliper',
            'flaticon-003-energy-drink',
            'flaticon-004-build',
            'flaticon-005-thinking-1',
            'flaticon-006-prism',
            'flaticon-007-paint',
            'flaticon-008-team',
            'flaticon-009-idea-3',
            'flaticon-010-diamond',
            'flaticon-011-compass',
            'flaticon-012-cube',
            'flaticon-013-puzzle',
            'flaticon-014-magic-wand',
            'flaticon-015-book',
            'flaticon-016-vision',
            'flaticon-017-notebook',
            'flaticon-018-laptop-1',
            'flaticon-019-coffee-cup',
            'flaticon-020-creativity',
            'flaticon-021-thinking',
            'flaticon-022-branding',
            'flaticon-023-flask',
            'flaticon-024-idea-2',
            'flaticon-025-imagination',
            'flaticon-026-search',
            'flaticon-027-monitor',
            'flaticon-028-idea-1',
            'flaticon-029-sketchbook',
            'flaticon-030-computer',
            'flaticon-031-scheme',
            'flaticon-032-explorer',
            'flaticon-033-museum',
            'flaticon-034-cactus',
            'flaticon-035-smartphone',
            'flaticon-036-brainstorming',
            'flaticon-037-idea',
            'flaticon-038-graphic-tool-1',
            'flaticon-039-vector',
            'flaticon-040-rgb',
            'flaticon-041-graphic-tool',
            'flaticon-042-typography',
            'flaticon-043-sketch',
            'flaticon-044-paint-bucket',
            'flaticon-045-video-player',
            'flaticon-046-laptop',
            'flaticon-047-artificial-intelligence',
            'flaticon-048-abstract',
            'flaticon-049-projector',
            'flaticon-050-satellite',
        ];
        return view('editproject', compact('project', 'icons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Projects $project)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'message' => 'required|min:3',
            'image' => 'image',
            'icone' => 'required'
            
        ]);

        if(request('image')){
            Storage::delete('\public\uploads\projects\\'.$project->image);
        }

        $attributes = $this->uploadImage($attributes);

        $project->update($attributes);
        
        return redirect('/admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage($attributes)
    {
        if(request()->hasFile('image')){
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $path = 'app\public\uploads\projects\\';

            Image::make($image)->save( storage_path($path . $filename ) );

            $attributes['image'] = $filename;
          };

          return $attributes;
    }
}
