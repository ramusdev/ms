<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{   
    /**
     * Show all posts
     * 
     */
    public function allPosts()
    {
        $posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('front/front-posts', ['posts' => $posts]);
    }

    /**
     * Show post by id
     * 
     */
    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        $comments = $this->buildThree($post->comment);

        //return view('front/front-show-post', ['post' => $post]);
    }

    public function buildThree($flat, $root = 0)
    {
        $collection = new Collection();

        foreach($flat as $key => $value) {

            $collection->push($value);

            if ($value->id == $root) {
                //
            }
        }

        dd($collection);
    }

}
