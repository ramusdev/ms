<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

class AdminImageController extends Controller
{
    /**
     * Show all images
     * 
     */
    public function allImages()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(20);

        return view('admin/admin-images', ['images' => $images]);
    }

    /**
     * Edit image
     * 
     */
    public function editImage($id) 
    {
        $image = Image::findOrFail($id);

        return view('admin/admin-image-edit', ['image' => $image]);
    }

    /**
     * Delete image
     * 
     */
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        Storage::delete($image->path);

        if ($image->delete()) {
            $message = 'Изображение удалено';
        }

        return redirect()->back()->with('message', $message);
    }
}
