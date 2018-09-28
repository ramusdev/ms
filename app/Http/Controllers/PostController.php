<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
	public function addIndex() 
	{
		//echo 'from post controller';
		return view('post-add', array());
	}

	public function addAction(Request $request)
	{
		//echo 'from add action';

		$post = new Post();

		$post->title = $request->title;
		$post->content = $request->content;

		$post->save();

		return redirect('/post-add');
	}

	public function editIndex()
	{
		//echo 'post edit';

		//return view('post-edit', array());
	}

	public function allIndex()
	{
		$posts = Post::orderBy('created_at', 'desc')->take(10)->get();

		//print_r($posts);
		//$posts = 'some text in string';

		return view('post-all', ['posts' => $posts]);
	}
    
}
