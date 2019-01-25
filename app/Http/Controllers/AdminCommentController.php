<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Relation;
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

        // Rebuild comment
        $childrens = Comment::where('parent_id', $comment->id)->get();
        foreach ($childrens as $key => $value) {
            $value->parent_id = $comment->parent_id;
            $value->save();
        }

        $comment->delete();

        return redirect()->back();
    }

    /**
     * Reply to comment
     * 
     */
    public function replyComment($modelName, $commentParentId)
    {
        $modelClass = Relation::getMorphedModel($modelName);

        $commentParent = Comment::findOrFail($commentParentId);
        $model = $modelClass::findOrfail($commentParent->commentable_id);

        return view('admin-comment-reply', ['post' => $model, 'comment_parent' => $commentParent]);
    }

    /**
     * Store comment
     * 
     */
    public function storeComment(Request $request, $modelName, $postId)
    {
        $comment = new Comment([
            'status' => $request->status,
            'content' => $request->content,
            'parent_id' => $request->parent_id
        ]);

        $modelClass = Relation::getMorphedModel($modelName);
        $model = $modelClass::findOrFail($postId);

        if ($model->comment()->save($comment)) {
            $message = 'Комментарий сохранен';
        }

        //return redirect()->action('AdminPostController@editPost', ['id' => $model->id])->with('message', $message);
    }
}
