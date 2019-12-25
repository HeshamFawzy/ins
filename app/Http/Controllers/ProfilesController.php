<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Auth;

use App\Post;

use App\ProfilePicture;

use Illuminate\Support\Facades\Storage;

use File;

class ProfilesController extends Controller
{
    //
    public function index()
    {
    	$user = auth()->user();
    	$id = $user->id;
    	$posts = Post::orderBy('created_at', 'desc')->get()->where('user_id' , $id);
    	$profiles = ProfilePicture::where('user_id', $id)->get();
        if (count($profiles) > 0){
            $profile = ProfilePicture::where('user_id', $id)->latest('created_at')->first();
        } else {
            return view('profiles.index', ['user'=> $user, 'posts' => $posts]);
        }
        return view('profiles.index', ['user'=> $user, 'posts' => $posts, 'profile' => $profile]);
    }

    public function create()
    {
    	return view('profiles.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        $picture = new ProfilePicture();
        $picture->user_id = auth()->user()->id;
        $picture->mime = $image->getClientMimeType();
        $picture->original_filename = $image->getClientOriginalName();
        $picture->filename = $image->getFilename().'.'.$extension;
        $picture->save();

        return redirect()->route('post.index');
    }

}
