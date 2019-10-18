<?php

namespace App;

use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $guarded = [];


    public function ProfilePhoto ()

    {   
        $photoPath = ($this->photo) ? $this->photo : "photos/index.png";
        
        Image::make(public_path("storage/{$photoPath}"))->fit(100, 100)->save();

        return '/storage/' . $photoPath;
    }

	public function user () 
	
	{    
    return $this->belongsTo(User::class);
	}

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}
