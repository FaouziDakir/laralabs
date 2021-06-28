<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Comment;

use Intervention\Image\Facades\Image;
use Storage;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('indexFrontend', 'show');
    }

    public function index(Post $posts)
    {
        $posts = Post::all();

        return view('articles', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'titre' => 'required|min:3',
            'message' => 'required|min:3',
            'image' => 'image|required'
            
        ]);

        $tags = request()->validate([
            'tags' => 'required|min:3'
        ]);

        $tags = explode(', ', $tags['tags']);
        
        $attributes = $this->uploadImage($attributes);

        $attributes['auteur_id'] = auth()->id();
        $post = Post::create($attributes);
        
        foreach($tags as $tag){

            if(Tag::where('tag_name', $tag)->get()->count() == 0){

                Tag::create([
                    'tag_name' => $tag
                ]);

            } 

            $post->tags()->attach(Tag::where('tag_name', $tag)->get());
        }


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comments)
    {

        return view('blog-post', compact('post'));
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
    public function update(Request $request, $id)
    {
        //
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

            $path = 'app\public\uploads\posts\\';

            Image::make($image)->save( storage_path($path . $filename ) );

            $attributes['image'] = $filename;
          };

          return $attributes;
    }

    public function indexFrontend(Post $posts)
    {
        $posts = Post::paginate(2);
        $tags = Tag::all();

        return view('blog', compact('posts', 'tags'));
    }
}
