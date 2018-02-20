<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->hasOne(Message::class);
    }
}
