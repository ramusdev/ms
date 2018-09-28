<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    protected $date = [
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];
   
}
