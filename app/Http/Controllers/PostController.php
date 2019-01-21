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
        dd($comments);

        //return view('front/front-show-post', ['post' => $post]);
    }

    public function buildThree($flat, $root = 0)
    {
        $collection = new Collection();

        foreach($flat as $key => $value) {

            //$comment = $value->put('parent', 'inserted item parent');
            //$collection->push($comment);
            //$value->child = 'this is child';
            //print_r($value);

            if ($value->parent_id == $root) {
                //$collection->push(($this->buildThree($flat, $value->parent_id));
                $this->buildThree($flat, $value->parent_id);
                $collection->push($value);
            }

        }

        return $collection;
        //dd($collection);
    }

}
