<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop','shop_id');
    }
    
    protected $fillable = ['id','shop_id', 'name', 'description', 'price', 'stock'];
    protected $table = "products";
}
