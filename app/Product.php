<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table = "product";
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category', 'id');
    }
}
