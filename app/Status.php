<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [''];
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_status');
    }
    /*
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    */
}
