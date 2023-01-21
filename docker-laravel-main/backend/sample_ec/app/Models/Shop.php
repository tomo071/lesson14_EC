<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected $fillable = ['id','user_id', 'name', 'description'];
    protected $table = "shops";
}
