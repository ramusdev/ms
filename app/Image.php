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

    protected $data = [
        'created_at',
        'update_at',
        'deleted_at'
    ];

    public function post() 
    {
        return $this->belongsTo('App\Post');
    }

    public function comment() 
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
