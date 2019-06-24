<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function roomtype()
    {
        return $this->belongsTo('App\Roomtype');
    }

    // hasMany() omdat het een many-to-many relation heeft met Reservations
    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
}
