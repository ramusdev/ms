<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Setting;

class AdminImageCompress extends Controller
{
    public $image_key;
    public $image_width;
    public $image_height;
    
    public function __construct()
    {
        $setting = Setting::find(1);

        $this->image_key = $setting->image_key;
        $this->image_width = $setting->image_width;
        $this->image_height = $setting->image_height;
    }

    public function compress()
    {
        $images = Image::all();   

        $storage = storage_path();
        foreach ($images as $key => $image)
        {
            if ($image->optimized == 1) continue;

            $path = $storage . '\app\thumbnails\\' . $image->name;
            $this->resizeImage($path);
            $this->optimizeImage($path);

            $image->optimized = 1;
            $image->save();
        }

        return redirect('/admin/settings')->with('message', 'Изображения оптимизированы');
    }

    public function optimizeImage($path)
    {
        $key = \Tinify\setKey($this->image_key);

        $source = \Tinify\fromFile($path);
        $source->toFile($path);
    }

    public function resizeImage($path)
    {
        $key = \Tinify\setKey($this->image_key);

        $source = \Tinify\fromFile($path);
        
        $resized = $source->resize([
            'method' => 'fit',
            'width' => (int) $this->image_width,
            'height' => (int) $this->image_height
        ]);

        $resized->toFile($path);
    }
}
