<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    protected $fillable = [
        'type',
        'name',
        'path',
        'post_id'
    ];

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at'
    ];

    public function editPath()
    {
        return 'AdminImageController@editImage';
    }

    public function post() 
    {
        return $this->belongsTo('App\Post');
    }

    public function comment() 
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
