<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    //    public function assignRole(Role $role)
    //    {
    //        return $this->roles()->save($role);
    //    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isClient()
    {
        return $this->roles()->where('name', 'client')->exists();
    }
}
