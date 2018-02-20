<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Notification extends Model
{
    public function users()
    {
        return $this->morphedByMany(User::class, 'notifiable');
    }

    public function cars()
    {
        return $this->morphedByMany(Car::class, 'notifiable');
    }

}
