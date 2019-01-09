<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     * Index create article
     * 
     */
    public function addIndex() 
	{
		return view('post-add', array());
	}

    /**
     * Create article
     * 
     * @param Request $request
     */

	public function addAction(Request $request)
	{
		$post = new Post();

		$post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;

        $post->save();

		return redirect()->action('PostController@editIndex', ['id' => $post->id]);
	}

    /**
     * Remove article by id
     * 
     * @param int $id
     */
    public function deleteAction($id) 
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/');
    }

	public function allIndex()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);

		return view('post-all', ['posts' => $posts]);
    }
    
    public function editIndex($id)
    {
        $post = Post::find($id);

        return view('post-edit', ['post' => $post]);
    }

    public function editAction(Request $request, $id)
	{
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;

        if ($post->save()) {
            $message = 'Изменения сохранены';
        }
        else {
            $message = 'Ошибка при сохранении';
        }
        
        //return redirect()->action('PostController@editIndex', ['id' => $post->id])->with('message', $message);
        return back()->with('message', $message);
	}
    
}
