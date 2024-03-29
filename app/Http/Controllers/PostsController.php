<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{


    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->paginate(4); // latest()* // orderBy
        
        return view('posts.index', compact('posts'));
    }

    public function create () 

    {
    	return view('posts.create');
    }

    public function store ()

    {

    	$data = request()->validate([
    		'caption' => 'required',
    		'image' => ['required', 'image'],
    	]);

		$imagePath = request('image')->store('uploads', 'public');
    	
    	auth()->user()->posts()->create([ // posts -> fonction dans le model post
    		'caption' => $data['caption'],
    		'image' => $imagePath,
    	]); 

        Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200)->save();

    return redirect('/profile/' . auth()->user()->id);
    
    }


    public function show (\App\Post $post) 
    {
    	return view('posts.show', compact('post'));
    }
}
