<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/*
The Role model has three main attributes:

name — Unique name for the Role, used for looking up role information in the application layer. For example: "admin", "owner", "employee".
display_name — Human readable name for the Role. Not necessarily unique and optional. For example: "User Administrator", "Project Owner", "Widget Co. Employee".
description — A more detailed explanation of what the Role does. Also optional.
*/
class Role extends EntrustRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
    /*
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
    */
}
