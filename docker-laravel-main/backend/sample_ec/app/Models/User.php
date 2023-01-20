<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function shop(){

        return $this->hasOne('App/Models/Shop');
    }

}
