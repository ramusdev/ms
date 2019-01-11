<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
