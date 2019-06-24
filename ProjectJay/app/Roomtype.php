<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    //
    public function roomtype()
    {
        return $this->hasMany('App\Room');
    }
}
