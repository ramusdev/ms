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

        $news = ParsNews::take(5)->get();

        $comments = Comment::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin/admin-all', compact('postAll', 'imageAll', 'commentAll', 'news', 'posts', 'comments'));
    }

}
