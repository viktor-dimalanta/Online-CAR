<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Car;
use App\Source;
use App\User;
use App\Classification;
use App\Status;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CarController extends Controller
{
    var $notifications;
    var $authID;

    public function __construct()
    {
        $this->middleware('auth');
        $this->authID = Auth::id();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_type = Auth::user()->type;
        //dd($current_user_type);
        if ($current_user_type == "originator") {
          $cars = Car::latest()
                      ->where('originator_id' , '=', Auth::id())
                      ->get();
        }else {
          $cars = Car::latest()
                      ->where('assignee_id' , '=', Auth::id())
                      ->where('is_draft' , '=', 1)
                      ->get();
        }


        //$cars = Car::paginate(10);
        /*$cars = DB::table('cars')
                ->where('originator_id' , '=', Auth::id())
                ->orWhere('assignee_id' , '=', Auth::id())
                ->get();*/
        //dd($cars->toArray());

        $statuses = Status::orderBy('id', 'desc')
                    ->get();
        //dd($statuses ->toArray());
        //return $cars;

        $user = User::find(Auth::id());
        $notifications = $user->notifications;

        return view('cars.index', compact('cars', 'statuses', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::all();

        $assignees = User::whereHas('roles', function($query){
            $query->where('name', 'assignee');
        })->get();

        $classifications = Classification::all();

        $user = User::find(Auth::id());
        $notifications = $user->notifications;

        return view('cars.create', compact('sources', 'assignees', 'classifications', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusDefault = 1;
        //dd($request->all());

        // 1. Validate
        $this->validate(request(), [
            'source_id' => 'required',
            'assignee_id' => 'required',
            'classification_id' => 'required',
            'description' => 'required'
        ]);

        // 2. Add new Car record
        if ($request->has('draft_button')) {
          $statusDefault = 11;
          $car->is_draft = 1;
          }

        $car = new Car;
        $car->originator_id = auth()->user()->id;
        $car->source_id = $request->source_id;
        $car->assignee_id = $request->assignee_id;
        $car->classification_id = $request->classification_id;
        $car->description = $request->description;
        $car->document_no = $request->document_no;
        $car->is_draft = 1;
        $car->save();



        $status = Status::find($statusDefault);
        $car->statuses()->attach($status);



        // 4. Add notification for assignee ()
        DB::table('notifiables')->insert(
            [
                'notification_id' => 1,
                'notifiable_id' => $request->assignee_id, // assignee_id, message_id
                'notifiable_type' => 'App\User', // e.g. App\User, App\Message
                'car_id' => $car->id,
                'seen' => false
            ]
        );

        // 5. Email the assignee/unit head
        // https://laravel.com/docs/5.5/notifications

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $user = User::find(Auth::id());
        $notifications = $user->notifications;

        //dd($car->toArray());
        //dd($car->messages());
        return view('cars.show', compact('car', 'notifications'));
    }

    public function search( Request $request )
    {

        $search_dropdown = $request->get('search');
        $cars = Car::WhereHas('statuses', function ($query) use ($search_dropdown) {
             $query->where('title', 'like', '%'.$search_dropdown.'%');
              });
        $statuses = Status::orderBy('id', 'asc')->get();
        //dd($statuses ->toArray());
        //return $cars;
        $user = User::find(Auth::id());
        $notifications = $user->notifications;

           return view('cars.index', compact('cars', 'statuses', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
