<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'amount',
        'available'
    ];

    public function entry()
    {
        return belongsTo('App\Entry');
    }
}
