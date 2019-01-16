<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store comment
     * 
     */
    public function storeComment(Request $request, $post_id)
    {
        /*
        $comment = Comment::firstOrCreate([
            'id' => $post_id,
            'parent_id' => 0,
            'content' => $request->content,
            'status' => 'published'
        ]);
        */

        $post = Post::findOrFail($post_id);

        $comment = new Comment([
            'parent_id' => 0,
            'content' => $request->content,
            'status' => 'published'
        ]);

        $post->comment()->save($comment);

        return redirect()->back();
    }

    public function storeReplyComment(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);

        $comment = new Comment([
            'parent_id' => $request->parent,
            'content' => $request->content,
            'status' => 'published'
        ]);

        $post->comment()->save($comment);

        return redirect()->back();

    }
}
