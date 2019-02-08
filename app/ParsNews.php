<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParsNews extends Model
{
    public $table = 'pars_news';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'pub_date'
    ];

    protected $fillable = [
        'title',
        'link',
        'pub_date'
    ];
}
