<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
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
    public function index(Service $services)
    {
        $services = Service::all();

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

        return view('servicesBackoffice', compact('services', 'icons'));
    }

    public function indexServices()
    {
        $services = Service::paginate(9);

        return view('services', compact('services'));
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
    public function store(Service $services)
    {
        $attributes = request()->validate([
            'titre' => 'required|min:3',
            'texte' => 'required|min:3',
            'icone' => 'required'
            
        ]);
        

        Service::create($attributes);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
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
        return view('editservice', compact('service', 'icons'));
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
    public function update(Service $service)
    {
        $attributes = request()->validate([
            'titre' => 'required|min:3',
            'texte' => 'required|min:3',
            'icone' => 'required'
            
        ]);
        

        $service->update($attributes);
        
        return redirect('/admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('/admin/services');
    }
}
