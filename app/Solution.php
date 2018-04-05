<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
  protected $guarded = [''];
  public function cars()
  {
      return $this->belongsToMany(Car::class, 'car_solution');
  }
}
