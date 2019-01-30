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

        $model = $comment->commentable;

        return view('/admin/admin-comment-edit', ['post' => $model, 'comment' => $comment]);
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
    public function replyComment($id)
    {
        //$modelClass = Relation::getMorphedModel($modelName);
        //$commentParent = Comment::findOrFail($commentParentId);
        //$model = $modelClass::findOrfail($commentParent->commentable_id);

        $comment = Comment::findOrFail($id);
        $model  = $comment->commentable;

        return view('/admin/admin-comment-reply', ['post' => $model, 'comment' => $comment]);
    }

    /**
     * Add comment
     * 
     */
    public function addComment($modelName, $id)
    {
        return view('/admin/admin-comment-add', ['model' => $modelName, 'id' => $id]);
    }

    /**
     * Store comment
     * 
     */
    public function storeComment(Request $request, $modelName, $modelId, $id = 0)
    {   
        $comment = Comment::firstOrNew([
            'id' => $id,
        ]);

        $comment->status = $request->status;
        $comment->content = $request->content;
        $comment->parent_id = $request->parent_id ? $request->parent_id : 0;

        $modelClass = Relation::getMorphedModel($modelName);
        $model = $modelClass::findOrFail($modelId);

        if ($model->comment()->save($comment)) {
            $message = 'Комментарий успешно добавлен';
        }

        return redirect()->action('AdminPostController@editPost', ['id' => $model->id])->with('message', $message);
    }
}
