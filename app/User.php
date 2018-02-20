<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Notification;

class User extends Authenticatable
{
    use Notifiable;

    use EntrustUserTrait; // add this trait to your user model
    
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
    /*
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')
            ->withPivot('display_name');
    }
    */

    public function originator()
    {
        return $this->hasMany(Car::class, 'originator_id');
    }

    public function assignee()
    {
        return $this->hasMany(Car::class, 'assignee_id');
    }

    // Many To Many Polymorphic Relations for Notifications
    /**
     * Get all the notifications for the user
     */
    public function notifications()
    {
        return $this->morphToMany(Notification::class, 'notifiable');
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

}
