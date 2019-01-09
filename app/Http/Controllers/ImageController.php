<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    /**
     * Show all images
     * 
     */
    public function indexAction()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(20);

        return view('images', ['images' => $images]);
    }

    /**
     * Delete image
     * 
     */
    public function deleteAction($id)
    {
        $image = Image::findOrFail($id);

        if ($image->delete()) {
            $message = 'Изображение удалено';
        }
        else {
            $message = 'Ошибка удаление изображения';
        }

        return back()->with('message', $message);
    }
}
