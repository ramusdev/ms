<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Post;
use App\Image;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store comment
     * 
     */
    public function storeComment(Request $request, $modelName, $postId)
    {
        $modelClass = Relation::getMorphedModel($modelName);
        $model = $modelClass::findOrFail($postId);
        
        $comment = new Comment([
            'parent_id' => 0,
            'content' => $request->content,
            'status' => 'published'
        ]);
        
        $model->comment()->save($comment);

        return redirect()->back();
    }

    public function storeReplyComment(Request $request, $modelName, $postId)
    {
        $modelClass = Relation::getMorphedModel($modelName);
        $model = $modelClass::findOrFail($postId);

        $comment = new Comment([
            'parent_id' => $request->parent,
            'content' => $request->content,
            'status' => 'published'
        ]);

        $model->comment()->save($comment);

        return redirect()->back();
    }
}
