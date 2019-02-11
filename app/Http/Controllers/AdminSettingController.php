<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Image;

class AdminSettingController extends Controller
{

    const SETTING_ID = 1;
    const SETTING_TITLE = 'Title';
    const SETTING_DESCRIPTION = 'Description';
    const SETTING_EMAIL = 'email@gmail.com';

    //public $key;

    /*
    public function __construct()
    {
        $setting = Setting::find(1);
        $this->key = $setting->image_key;
    }
    */

    /**
     * All settings
     * 
     */
    public function all()
    {
        $setting = Setting::firstOrCreate(
            [
                'id' => self::SETTING_ID
            ],
            [
                'title' => self::SETTING_TITLE,
                'description' => self::SETTING_DESCRIPTION,
                'email' => self::SETTING_EMAIL
            ]
        );

        $imageOptimizedNum = Image::where('optimized', 1)->count();
        $imageNotOptimizedNum = Image::where('optimized', 0)->count();

        //$key = \Tinify\setKey($this->key);
        //$imageApiNum = \Tinify\compressionCount();
        //dd($imageApiNum);

        return view('/admin/admin-settings', compact('setting', 'imageOptimizedNum', 'imageNotOptimizedNum'));
    }

    /**
     * Store image setting
     * 
     */
    public function storeMain(Request $request)
    {
        $setting = Setting::find(self::SETTING_ID);

        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->email = $request->email;

        $setting->save();

        return redirect('/admin/settings')->with('message', 'Настройки сохранены');
    }

    /**
     * Store setting image
     * 
     */
    public function storeImage(Request $request)
    {
        $setting = Setting::find(self::SETTING_ID);

        $setting->image_key = $request->image_key;
        $setting->image_width = $request->image_width;
        $setting->image_height = $request->image_height;

        $setting->save();

        return redirect('/admin/settings')->with('message', 'Настройки сохранены');
    }
}
