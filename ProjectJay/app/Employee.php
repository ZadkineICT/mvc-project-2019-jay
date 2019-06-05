<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
