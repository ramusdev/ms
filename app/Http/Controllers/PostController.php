<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('front/front-show-post', ['post' => $post]);
    }

}
