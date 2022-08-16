<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class View_controller extends Controller
{
    public function index()
    {
        Auth::logout();
        $carousel_first = Carousel::orderBy('id','desc')->limit(1)->first();
        $carousel = Carousel::orderBy('id','desc')->get();

        $services_first = Services::orderBy('id','desc')->limit(1)->first();
        $services = Services::orderBy('id','desc')->get();
        return view('welcome',[
            'carousel' => $carousel,
            'services_first' => $services_first,
            'services' => $services,
            'carousel_first' => $carousel_first,
        ]);
    }

    public function booking()
    {
        $services = Services::get();
        $sched = Schedule::where('status','!=','reserved')->orWhere('status','!=','partially paid')->get();
        return view('booking',[
            'sched' => $sched,
            'services' => $services,
        ]);
    }

    public function booking_process(Request $request)
    {
        $validated = $request->validate([
            'available_schedules' => 'required',
            'services' => 'required',
            'number_of_attending_persons' => 'required',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
