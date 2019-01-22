<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Post;
use App\Category;
use App\Image;

class AdminPostController extends Controller
{
    /**
     * Add post
     * 
     */
    public function addPost()
    {
        return view('post-add');
    }

    /**
     * Remove post
     * 
     * @param int $id
     */
    public function deletePost($id) 
    {
        $post = Post::find($id);

        $post->image()->delete();

        if ($post->delete()) {
            $message = 'Пост удален';
        }

        return redirect('admin/posts')->with('message', $message);
    }

    /**
     * All posts
     * 
     */
	public function allPosts()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);

		return view('post-all', ['posts' => $posts]);
    }

    /**
     * Edit post
     * 
     */
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $comments = $post->comment;

        $postcat = $post->category()->pluck('slug')->toArray();
        
        return view('post-edit', ['post' => $post, 'categories' => $categories, 'postcat' => $postcat, 'comments' => $comments]);
    }

    /**
     * Store action used for craetion and edition
     * 
     */
    public function storePost(Request $request, $id = 0)
	{   
        $post = Post::firstOrCreate([
            'id' => $id
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $file = $request->file('thumbnail');

        if ($post->save()) {
            $message = 'Изменения сохранены';
        }

        if ($request->category) {
            $categoryIds = Category::whereIn('slug', $request->category)->pluck('id')->toArray();
        }
        else {
            $categoryIds = [];
        }
        
        $post->category()->sync($categoryIds);
        

        $this->storeFile($post, $file);
                
        return redirect()->action('AdminPostController@editPost', ['id' => $post->id])->with('message', $message);
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
