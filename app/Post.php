<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    protected $attributes = [
        'status' => 'pending'
    ];

    protected $fillable = [
        'title',
        'content',
        'status'
    ];

    protected $date = [
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];

    public function image() {
        return $this->hasOne('App\Image', 'post_id');
    }

    public function category() {
        return $this->belongsToMany('App\Category');
    }
   
}
