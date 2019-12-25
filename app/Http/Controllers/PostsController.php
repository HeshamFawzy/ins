<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;
use App\Post;

class PostsController extends Controller
{
    //
    public function create()
    {
    	return view('posts.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'caption' => 'required',
            'image' => 'required',
        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->caption = $request->caption;
        $post->mime = $image->getClientMimeType();
        $post->original_filename = $image->getClientOriginalName();
        $post->filename = $image->getFilename().'.'.$extension;
        $post->save();

        return redirect()->route('post.index');
    }

     public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }

}
