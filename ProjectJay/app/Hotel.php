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

    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }
}
