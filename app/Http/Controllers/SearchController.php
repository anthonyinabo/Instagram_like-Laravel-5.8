<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function store()
    {
    	
    	$users = Request([
    		'search',
    	]);

   			return redirect("/profile/" . $users['search']);
   	}
}	
