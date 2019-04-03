<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable = [
        'code',
        'discount'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
