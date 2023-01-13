<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function prodacts(){

        return $this->hasMany('App/Models/Product');
    }
}
