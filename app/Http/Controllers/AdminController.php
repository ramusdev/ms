<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
	public function postsAll()
	{
		//echo 'from view';

		$posts = Post::orderBy('created_at')->take(10)->get();

		return view('admin/index', ['posts' => $posts]);
	}


    public function postEdit()
    {

    }

    /*
    public function postDelete($id)
    {	
    	$post = Post::find($id);
    	$post->delete();

    	return redirect('/admin-area');
    }
    */

    public function postDelete($id)
    {	

    	//echo $id;

    	$post = Post::find($id);
    	$post->delete();
    	return redirect('/admin-area');
    }
}
