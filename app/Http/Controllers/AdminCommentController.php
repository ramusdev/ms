<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class AdminCommentController extends Controller
{
    /**
     * Edit comment
     * 
     */
    public function editComment($id)
    {
        $comment = Comment::findOrFail($id);
        $post = Post::findOrFail($comment->commentable_id);

        return view('admin-comment-edit', ['post' => $post, 'comment' => $comment]);
    }

    /**
     * Delete commment
     * 
     */
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }

    public function storeComment(Request $request, $id = 0)
    {
        /*
        $comment = Comment::firstOrCreate([
            'id' => $id,
            'status' => $request->status,
            'content' => $request->content,
            'parent_id' => 0
        ]);
        */

        $comment = Comment::findOrFail($id);
        $comment->status = $request->status;
        $comment->content = $request->content;

        $post = Post::findOrFail($comment->commentable_id);
        //dd($post);

        if ($post->comment()->save($comment)) {
            $message = 'Комментарий сохранен';
        }

        return redirect()->action('AdminCommentController@editComment', ['id' => $comment->id])->with('message', $message);
    }
}
