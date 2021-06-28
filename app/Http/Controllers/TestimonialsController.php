<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

use Intervention\Image\Facades\Image;
use Storage;

class TestimonialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Testimonial $testimonials)
    {
        $testimonials = Testimonial::all();

        return view('testimonials', compact('testimonials'));
    }


    public function create()
    {
        return view('testimonials');
    }

  
    public function store(Request $request, Testimonial $testimonials)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'job' => 'required|min:3',
            'message' => 'required|min:3',
            'image' => 'image|required'
            
        ]);
        
        $attributes = $this->uploadImage($attributes);

        Testimonial::create($attributes);
        
        return back();
    }

  
    public function show( Testimonial $testimonials)
    {
        return view('edittestimonial', compact('testimonials'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request,Testimonial $testimonials)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'job' => 'required|min:3',
            'message' => 'required|min:3',
            'image' => 'image'
            
        ]);

        if(request('image')){
            Storage::delete('\public\uploads\testimonials\\'.$testimonials->image);
        }
        

        $attributes = $this->uploadImage($attributes);

        $testimonials->update($attributes);
        
        return redirect('/admin/testimonials');
    }

  
    public function destroy(Testimonial $testimonials)
    {
        Storage::delete('\public\uploads\testimonials\\'.$testimonials->image);

        $testimonials->delete();

        return redirect('/admin/testimonials');
    }

    public function uploadImage($attributes)
    {
        if(request()->hasFile('image')){
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $path = 'app\public\uploads\testimonials\\';

            Image::make($image)->save( storage_path($path . $filename ) );

            $attributes['image'] = $filename;
          };

          return $attributes;
    }
}
