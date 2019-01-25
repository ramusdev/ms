<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Image;
use App\Comment;

class ImageController extends Controller
{
    /**
     * Show all images
     * 
     */
    public function allImages()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(10);

        return view('/front/front-images', ['images' => $images]);
    }

    /**
     * Show image
     * 
     */
    public function showImage($id)
    {
        $image = Image::findOrFail($id);
        $comments = Helper::buildThree($image->comment);

        return view('/front/front-show-image', ['image' => $image, 'comments' => $comments]);
    }
}
