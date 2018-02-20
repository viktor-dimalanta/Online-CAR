<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\CarHelper;

class DashboardController extends Controller
{
    var $notifications;

    public function __construct()
    {
        $this->middleware('auth');

        //$user = User::find(Auth::id());
        //$notifications = User::getNotifications();
        //$this->notifications = $user->notifications->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $notifications = $user->notifications;


        //$notifications = Notification::getNotifications(Auth::id());

//        var_dump($notifications);
//        var_dump( $user->notifications()->toSql() );
//        var_dump( $user->notifications()->getBindings() );
          //dd($user->notifications->toArray());
//        var_dump( $user->toSql() );
//        var_dump( $user->getBindings() );
//        var_dump( $user->notifications()->toSql() );
//        var_dump( $user->notifications()->getBindings() );

        //$car =
        //dd($user->notifications());
        //dd();

        //return view('pages.dashboard', compact('notifications'));

        return view('pages.dashboard')->with([
            'notifications' => $notifications
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
