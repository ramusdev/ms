<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Post;
use App\Library\Services\Contracts\CartServiceInterface;

class PostController extends Controller
{   
    /**
     * Show all posts
     * 
     */
    public function allPosts(Request $request, CartServiceInterface $cartServiceInterface)
    {

        //$request->session()->put('zname10', 'value 1');

        $all = $request->session()->all();

        dd($all);
        
        /*
        $posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        */

        //echo $cardServiceInterface->getCard();

        //echo $cartServiceInterface->setCart();

        //return view('front/front-posts', ['posts' => $posts]);
    }

    /**
     * Show post by id
     * 
     */
    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        $comments = Helper::buildThree($post->comment);

        return view('front/front-show-post', ['post' => $post, 'comments' => $comments]);
    }

}
