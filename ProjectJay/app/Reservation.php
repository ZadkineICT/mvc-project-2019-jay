<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    // hasMany() omdat het een many-to-many relation heeft met Room
    public function room()
    {
        return $this->hasMany('App\Room');
    }
}
