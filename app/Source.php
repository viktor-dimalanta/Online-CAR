<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
