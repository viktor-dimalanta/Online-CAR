<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;

class CarHelper extends Model
{
    public static function getNotifications()
    {
        $user = User::find(Auth::id());
        if (!empty($user->notifications)) {
            dd($user->notifications);
            return $user->notifications;
        }
        return false;

    }
}
