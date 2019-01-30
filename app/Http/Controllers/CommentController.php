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
    public function storeComment(Request $request, $modelName, $modelId)
    {
        $modelClass = Relation::getMorphedModel($modelName);
        $model = $modelClass::findOrFail($modelId);
        
        $comment = new Comment([
            'content' => $request->content,
            'status' => 'published',
            'parent_id' => $request->parent_id ? $request->parent_id : 0
        ]);
        
        $model->comment()->save($comment);

        return redirect()->back();
    }
}
