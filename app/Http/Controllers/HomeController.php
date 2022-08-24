<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservations;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $user_type = User::find(auth()->user()->id);

        if ($user_type->user_type == 'client') {
            return redirect('booking');
        }else{
            $reservation_count = Reservations::where('status','Pending Approval')->count();
            return view('home', compact('widget'),[
                'reservation_count' => $reservation_count,
            ]);
        }

       
    }
}
