<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    protected $fillable = [
        'title',
        'path'
    ];

    protected $data = [
        'created_at',
        'update_at',
        'deleted_at'
    ];

}
