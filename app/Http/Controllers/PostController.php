<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
	public function addIndex() 
	{
		return view('post-add', array());
	}

	public function addAction(Request $request)
	{
		$post = new Post();

		$post->title = $request->title;
		$post->content = $request->content;

		$post->save();

		return redirect('/post-add');
	}

    public function deleteAction($id) 
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }

	public function allIndex()
	{
		$posts = Post::orderBy('created_at', 'desc')->take(100)->get();

		return view('post-all', ['posts' => $posts]);
    }
    
    public function editIndex($id)
    {
        $post = Post::find($id);

        return view('post-edit', ['post' => $post]);
    }

    public function editAction(Request $request, $id)
	{
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect('/');
	}
    
}
