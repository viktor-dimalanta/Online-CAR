<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
Messaging many to many on one table
//Person.php
public function children(){
    return $this->belongsToMany('App\Person', 'child_parent', 'parent_id', 'child_id')
}
public function parents(){
    return $this->belongsToMany('App\Person', 'child_parent', 'child_id', 'parent_id')
}
*/
class Car extends Model
{
    protected $guarded = [];

    public function originator()
    {
        return $this->belongsTo(User::class, 'originator_id', 'id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id', 'id');
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'car_status')
                  //  ->where('car_status.status_id','<>','11')
                    //->latest();
                    ->orderBy('car_status.id', 'asc');
    }
    public function search_statuses()
    {
        return $this->belongsToMany(Status::class, 'car_status')
                    ->latest();

    }


    /*public function status()
    {
        return $this->hasMany(Status::class, 'status_id', 'id');
    }*/

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}
