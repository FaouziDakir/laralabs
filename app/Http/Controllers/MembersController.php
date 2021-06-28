<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Intervention\Image\Facades\Image;
use Storage;

class MembersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('members', compact('users'));
    }

    public function create()
    {
        return view('members');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'biographie' => 'required|min:3',
            'password' => 'required|min:3',
            'role' => 'required',
            'avatar' => 'image|required'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $attributes = $this->uploadImage($attributes);

        User::create($attributes);

        return redirect('/admin/members');
    }

    public function show(User $user)
    {
        return view('editmember', compact('user'));
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

    public function update(Request $request, User $user)
    {
        $user->update(request(['name','email','role']));

        return redirect('/admin/members');
    }


    public function destroy(User $user)
    {
        if($user->id !== 1){
            $user->delete();

            return redirect('/admin/members');
        } 
    }

    public function uploadImage($attributes)
    {
        if(request()->hasFile('avatar')){
            $image = request()->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $path = 'app\public\uploads\users\\';

            Image::make($image)->save( storage_path($path . $filename ) );

            $attributes['avatar'] = $filename;
          };

          return $attributes;
    }
}
