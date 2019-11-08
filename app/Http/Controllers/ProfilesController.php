<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
	public function __construct ()
	{
		return $this->middleware('auth');
	}

    public function index (User $user) 

    {   

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;

        $postsCount = Cache::remember('posts.count' . $user->id, now()->addSeconds(30), function () use ($user) {
    
        return  $user->posts->count(); 
    
    });

        $followersCount = Cache::remember('followers.count' . $user->id, now()->addSeconds(30), function () use ($user) {
    
        return $user->profile->followers->count();

    });

        $followingCount = Cache::remember('following.count' . $user->id, now()->addSeconds(30), function () use ($user) {
    
        return $user->following->count();
        
    
    });


    	return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }
    

    public function edit (User $user)

    {
    	$this->authorize('update', $user->profile);

    	return view('profiles.edit', compact('user'));
    }



	public function update(User $user)

    {
    	$this->authorize('update', $user->profile);

    	$data = request()->validate([
    		'title' => 'required',
    		'description' => 'required',
    		'photo'
    	]);

    	if (request('photo')) {	

		$photoPath = request('photo')->store('photos', 'public');

        $image = Image::make(public_path("storage/{$photoPath}"))->fit(1200, 1200);
        $image->save();

		$photoArray = ['photo' => $photoPath];
		}

			 auth()->user()->profile->update(array_merge(
    		 	$data,
    		 	$photoArray ?? [],
    	));
		

    	return redirect("/profile/" .  auth()->user()->id);
    }
}