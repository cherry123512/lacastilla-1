<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use App\Models\Schedule;
use App\Models\Reservations;
use App\Models\Reservation_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class View_controller extends Controller
{
    public function index()
    {
        Auth::logout();
        $carousel_first = Carousel::orderBy('id', 'desc')->where('status','!=','deactivated')->limit(1)->first();
        $carousel = Carousel::orderBy('id', 'desc')->where('status','!=','deactivated')->get();

        $services_first = Services::orderBy('id', 'desc')->limit(1)->first();
        $services = Services::orderBy('id', 'desc')->get();
        return view('welcome', [
            'carousel' => $carousel,
            'services_first' => $services_first,
            'services' => $services,
            'carousel_first' => $carousel_first,
        ]);
    }

    public function booking()
    {
        $services = Services::get();
        $sched = Schedule::where('status', '!=', 'reserved')->orWhere('status', '!=', 'partially paid')->get();
        return view('booking', [
            'sched' => $sched,
            'services' => $services,
        ]);
    }

    public function booking_process(Request $request)
    {
        $validated = $request->validate([
            'available_schedules' => 'required',
            'services' => 'required',
            'number_of_attending_persons' => 'required|numeric',
        ]);
        
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $time = date('H:i:s a');

        $new = new Reservations([
            'schedule_id' => $request->input('available_schedules'),
            'user_id' => auth()->user()->id,
            'reservation_date' => $date,
            'reservation_time' => $time,
            'number_of_persons' => $request->input('number_of_attending_persons'),
            'validation_date' => null,
            'curator_id' => null,
            'remarks' => 'Pending Approval',
            'status' => 'Pending Approval',
        ]);

        $new->save();

        foreach ($request->input('services') as $key => $data) {
            $details = new Reservation_details([
                'reservation_id' => $new->id,
                'service_id' => $data,
                'amount' => 0,
            ]);

            $details->save();
        }

        return redirect('booking')->with('success','You have successfully requested for a reservation. Please wait for approval via email. Thank you');

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function client_reservation()
    {
        $reservations = Reservations::where('user_id',auth()->user()->id)->get();
        return view('client_reservation',[
            'reservations' => $reservations,
        ]);
    }
}
