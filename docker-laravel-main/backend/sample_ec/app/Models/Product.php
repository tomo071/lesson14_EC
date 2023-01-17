<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = ['id','shop_id', 'name', 'description', 'price', 'stock'];
    protected $table = "products";
}
