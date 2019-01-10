<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Post;
use App\Image;

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
        $file = $request->file('thumbnail');

        if ($post->save()) {
            $message = 'Пост добавлен';
        }

        $this->storeFile($post, $file);

		return redirect()->action('PostController@editIndex', ['id' => $post->id])->with('message', $message);
	}

    /**
     * Remove article by id
     * 
     * @param int $id
     */
    public function deleteAction($id) 
    {
        $post = Post::find($id);
        $post->image()->delete();
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
        $file = $request->file('thumbnail');

        if ($post->save()) {
            $message = 'Изменения сохранены';
        }

        $this->storeFile($post, $file);
                
        return redirect()->action('PostController@editIndex', ['id' => $post->id])->with('message', $message);
    }

    public function storeFile($post, $file) 
    {  
        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = Storage::putFileAs('thumbnails', $file, $fileName);

            $imageData = [
                'type' => 'thumbnail',
                'path' => $filePath,
                'name' => $fileName
            ];

            if (! $post->image()->exists()) {
                $image = new Image($imageData);
                $post->image()->save($image);    
                //$post->image()->create($imageData);
            }
            else {
                $post->image()->update($imageData);
            }
        }
    }
    
}