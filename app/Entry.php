<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';

    protected $fillable = [
        'quantity'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
