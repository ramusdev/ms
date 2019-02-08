<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Image;
use App\ParsNews;

class AdminMainController extends Controller
{
    /**
     * Main admin page
     * 
     */
    public function all()
    {
        $postAll = Post::all()->count();
        $imageAll = Image::all()->count();
        $commentAll = Comment::all()->count();
        $parsNews = ParsNews::take(10)->get();

        $posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        //dd($posts);

        return view('admin/admin-all', compact('postAll', 'imageAll', 'commentAll', 'parsNews', 'posts'));
    }

}
