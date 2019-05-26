<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    public function room()
    {
        return $this->hasMany('App\Room');
    }
}
