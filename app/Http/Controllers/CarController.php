<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Car;
use App\Source;
use App\User;
use App\Classification;
use App\Status;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
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
        // if ($current_user_type == "originator") {
        //   $cars = Car::where('originator_id' , '=', Auth::id())
        //               ->latest()
        //               ->paginate(10);
        // }else {
        //   $cars = Car::where('assignee_id' , '=', Auth::id())
        //               ->latest()
        //               ->paginate(10);
        // }

        $cars = Car::where('originator_id' , '=', Auth::id())
                    ->orWhere('assignee_id' , '=', Auth::id())
                    ->whereHas('statuses', function($query){
                        $query->where('title', '<>', 'Draft');
                    })
                    ->latest()
                    ->paginate(10);


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

        return view('cars.index', compact('cars', 'statuses', 'notifications','current_user_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = Source::all();
        $current_user_type = Auth::user()->type;

        $assignees = User::whereHas('roles', function($query){
            $query->where('name', 'assignee');
        })->get();

        $classifications = Classification::all();

        $user = User::find(Auth::id());
        $notifications = $user->notifications;

        return view('cars.create', compact('sources', 'assignees', 'classifications', 'notifications','$current_user_type'));
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
          $car_draft = 1;
        }else {
          $car_draft = 0;
        }

        $car = new Car;
        $car->originator_id = auth()->user()->id;
        $car->source_id = $request->source_id;
        $car->assignee_id = $request->assignee_id;
        $car->classification_id = $request->classification_id;
        $car->description = $request->description;
        $car->document_no = $request->document_no;
        $car->is_draft = $car_draft;
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
        $current_user_type = Auth::user()->type;
        $notifications = $user->notifications;
        $sources = Source::all();
        $cars = Car::all();

        //dd($car->toArray());
        //dd($car->messages());
        return view('cars.show', compact('car', 'notifications','cars','sources','current_user_type'));
    }

    public function search( Request $request )
    {

        $search_dropdown = $request->get('search');
        //dd($search_dropdown);
        $current_user_type = Auth::user()->type;

        $cars = Car::where('is_draft', 1)
        ->whereHas('search_statuses', function($query) use ($search_dropdown){
                        $query->where('title','like', '%'.$search_dropdown.'%');
                    })->latest()
                    ->where('originator_id' , '=', Auth::id())
                    ->orWhere('assignee_id' , '=', Auth::id())
                    ->paginate(10);

                    // if ($search_dropdown == 'DRAFT') {
                    // $cars = Car::where('is_draft', 1)
                    // ->whereHas('search_statuses', function($query) use ($search_dropdown){
                    //                 $query->where('code','like', '%'.$search_dropdown.'%');
                    //             })->latest()
                    //             ->where('originator_id' , '=', Auth::id())
                    //             ->orWhere('assignee_id' , '=', Auth::id())
                    //             ->paginate(10);
                    // }else{
                    //
                    // $cars = Car::where('is_draft', 0)
                    // ->whereHas('search_statuses', function($query) use ($search_dropdown){
                    //                   $query->where('code','like', '%'.$search_dropdown.'%');
                    //               })->latest()
                    //               ->where('originator_id' , '=', Auth::id())
                    //               ->orWhere('assignee_id' , '=', Auth::id())
                    //               ->paginate(10);
                    // }
        $statuses = Status::orderBy( 'id' , 'desc');
        $user = User::find(Auth::id());
        $notifications = $user->notifications;

           return view('cars.index', compact('cars', 'statuses', 'notifications'));
    }

    public function search_cars( Request $request )
    {
        $current_user_type = Auth::user()->type;
        $search_cars = $request->get('search_cars');

        if ($current_user_type=='originator') {
          $cars = Car::where('originator_id' , '=', Auth::id())
                     ->where('description','like','%'.$search_cars.'%')
                     ->latest()
                     ->paginate(10);
        }elseif ($current_user_type=='assignee'){
          $cars = Car::where('assignee_id' , '=', Auth::id()) //change this
                     ->where('description','like','%'.$search_cars.'%')
                     ->orwhere('originator_id' , '=', Auth::id())
                     ->where('description','like','%'.$search_cars.'%')
                     ->latest()
                     ->paginate(10);
        } else{}

        $statuses = Status::orderBy( 'id' , 'desc');
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
        // 1. Update CAR status

       // 2. Send car notif to originator
       // ...
    }

    public function storeMessage(Request $request){
      // 1. Save Messages

     // 2. Send message notif
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
      //try

      $car = Car::find($id);
      $source = Source::find($id);
      $notification = Notification::find($id);
      $status = Status::find($id);
      $user = User::find($id);
      return view('update', compact('car','source','notification','status','user'));

      $car = Car::find($id);
      $car->originator_id = auth()->user()->id;
      $car->source_id = $request->source_id;
      $car->assignee_id = $request->assignee_id;
      $car->classification_id = $request->classification_id;
      $car->description = $request->description;
      $car->document_no = $request->document_no;
      $car->is_draft = $car_draft;
      $car->save();
    }

    public function submit_sol(Request $request){
      $id = $_POST['id'];
      $immediate_action = $_POST['immediate_action'];
      $immediate_action_date = $_POST['immediate_action_date'];

      $root_cause = $_POST['root_cause'];
      $root_cause_date = $_POST['root_cause_date'];

      $corrective_action = $_POST['corrective_action'];
      $corrective_action_date = $_POST['corrective_action_date'];

      // foreach ($immediate_action as $a ) {
      //   echo $immediate_action[$a];
      // }

      // echo $immediate_action;
      // echo $immediate_action_date;
      // echo $root_cause;
      // echo $root_cause_date;
      // echo $corrective_action;
      // echo $corrective_action_date;
      // echo $id;

        $id1 = DB::table('solutions')->insertGetId(
          [
              'type' => 1,
              'description' =>$immediate_action,
              'root_cause_type' =>0,
              'target_date' =>$immediate_action_date,
              'date_completed' =>$immediate_action_date,
              'attachment' =>'none',
              'status_originator' =>1,
              'status_admin' =>1,
          ]);
        $id2 = DB::table('solutions')->insertGetId(
              [
                'type' => 2,
                'description' =>$root_cause,
                'root_cause_type' =>$root_cause,
                'target_date' =>$root_cause_date,
                'date_completed' =>$root_cause_date,
                'attachment' =>'none',
                'status_originator' =>1,
                'status_admin' =>1,
              ]);
      $id3 = DB::table('solutions')->insertGetId(
                  [
                    'type' => 3,
                    'description' =>$corrective_action,
                    'root_cause_type' =>0,
                    'target_date' =>$corrective_action_date,
                    'date_completed' =>$corrective_action_date,
                    'attachment' =>'none',
                    'status_originator' =>1,
                    'status_admin' =>1,
                  ]);


      DB::table('car_solution')->insert(
            [
              'car_id' => $id,
              'solution_id' =>$id1,
            ]);
      DB::table('car_solution')->insert(
            [
              'car_id' => $id,
              'solution_id' =>$id2,
            ]);
      DB::table('car_solution')->insert(
            [
                'car_id' => $id,
                'solution_id' =>$id3,
            ]);

      DB::table('car_status')->insert(
            [
                'car_id' => $id,
                'status_id' =>2,

            ]
            );

    }


    public function update_stat(Request $request){
      // $q = 30;
      // $e =6;
       $stat = $_POST['stat'];
       $id = $_POST['id'];

      DB::table('car_status')->insert(
          [
              'car_id' => $id,
              'status_id' =>$stat,

          ]
      );
      return redirect('/cars');

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
