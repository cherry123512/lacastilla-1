<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use App\Models\Message;
use App\Mail\lacastilla_mail;
use App\Mail\Reservation_approved;

use App\Models\Reservations;
use App\Models\schedule;
use App\Models\schedule_details;
use Illuminate\Console\Scheduling\Schedule as SchedulingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Lacastilla_controller extends Controller
{

    public function lacastilla_admin()
    {
        return view('auth/admin_login');
    }

    public function inventory_list()
    {
        $inventory = Inventory::get();
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('inventory_list', [
            'inventory' => $inventory,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function inventory_add()
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('inventory_add', [
            'reservation_count' => $reservation_count,
        ]);
    }

    public function inventory_add_save(Request $request)
    {
        //return $request->all();

        // $validated = $request->validate([
        //     'type_of_object' => 'required',
        //     'location_of_object' => 'required',
        //     'description_title' => 'required',
        //     'number_of_pieces' => 'required',
        //     'length' => 'required',
        //     'width' => 'required',
        //     'dimension' => 'required',
        //     'medium_and_material' => 'required',
        //     'maker_artist' => 'required',
        //     'location_of_signation' => 'required',
        //     'date_of_birth' => 'required',
        //     'location_of_date_on_object' => 'required',
        //     'writing_other_than_signature' => 'required',
        //     'place_of_origin' => 'required',
        //     'place_collected' => 'required',
        //     'date_received' => 'required',
        //     'original_as_shown' => 'required',
        //     'object_original_used' => 'required',
        //     'receipt' => 'required',
        //     'item_description' => 'required',
        //     'condition_of_object' => 'required',
        //     'history' => 'required',
        //     'purchase_or_received' => 'required',
        //     'personal_story_of_this_object' => 'required',
        //     'inventory_image' => 'required',
        // ]);



        // $inventory_image = $request->file('inventory_image');
        // $inventory_image_name = $inventory_image->getClientOriginalName();
        // $inventory_image_file_type = $inventory_image->getClientmimeType();
        // $inventory_image->move(public_path() . '/upload_image/', $inventory_image_name);

        if ($request->file('inventory_image')) {
            $inventory_image = $request->file('inventory_image');
            $inventory_image_name = 'inventory_image-' . time() . '.' . $inventory_image->getClientOriginalExtension();
            $path_inventory_image = $inventory_image->storeAs('public', $inventory_image_name);
        } else {
            $inventory_image_name = '';
        }


        $inventory_save = new Inventory([
            'curator_id' => auth()->user()->id,
            'type_of_object' => $request->input('type_of_object'),
            'location_of_object' => $request->input('location_of_object'),
            'description_title' => $request->input('description_title'),
            'number_of_pieces' => $request->input('number_of_pieces'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'diameter' => $request->input('diameter'),
            'reference_number' => $request->input('reference_number'),
            'medium_and_material' => $request->input('medium_and_material'),
            'maker_artist' => $request->input('maker_artist'),
            'location_of_signation' => $request->input('location_of_signation'),
            'date_of_birth' => $request->input('date_of_birth'),
            'location_of_date_on_object' => $request->input('location_of_date_on_object'),
            'writing_other_than_signature' => $request->input('writing_other_than_signature'),
            'place_of_origin' => $request->input('place_of_origin'),
            'place_collected' => $request->input('place_collected'),
            'date_received' => $request->input('date_received'),
            'original_as_shown' => $request->input('original_as_shown'),
            'object_original_used' => $request->input('object_original_used'),
            'receipt' => $request->input('receipt'),
            'item_description' => $request->input('item_description'),
            'condition_of_object' => $request->input('condition_of_object'),
            'history' => $request->input('history'),
            'purchase_or_received' => $request->input('purchase_or_received'),
            'personal_story_of_this_object' => $request->input('personal_story_of_this_object'),
            'inventory_image' => $inventory_image_name,
        ]);

        $inventory_save->save();

        return redirect('inventory_list')->with('success', 'Successfully added new inventory');
    }

    public function carousel()
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('carousel', [
            'reservation_count' => $reservation_count,
        ]);
    }

    public function carousel_save(Request $request)
    {
        //return $request->input();

        $validated = $request->validate([
            'title' => 'required',
            'note' => 'required',
            'image' => 'required',
        ]);

        // $image = $request->file('image');
        // $image_name = $image->getClientOriginalName();
        // $image_file_type = $image->getClientmimeType();
        // $image->move(public_path() . '/upload_image/', $image_name);

        $inventory_image = $request->file('image');
        $inventory_image_name = 'inventory_image-' . time() . '.' . $inventory_image->getClientOriginalExtension();
        $path_inventory_image = $inventory_image->storeAs('public', $inventory_image_name);

        $carousel_saved = new Carousel([
            'title' => $request->input('title'),
            'note' => $request->input('note'),
            'image' => $inventory_image_name,
            'curator_id' => auth()->user()->id,
        ]);

        $carousel_saved->save();

        return redirect('carousel')->with('success', 'Successfully added a new carousel image');
    }

    public function services()
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('services', [
            'reservation_count' => $reservation_count,
        ]);
    }

    public function services_save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'service_image' => 'required',
            'amount' => 'required|numeric|between:0,9999.99',
        ]);

        // $service_image = $request->file('service_image');
        // $service_image_name = $service_image->getClientOriginalName();
        // $service_image_file_type = $service_image->getClientmimeType();
        // $service_image->move(public_path() . '/upload_image/', $service_image_name);

        $service_image = $request->file('service_image');
        $service_image_image_name = 'service_image-' . time() . '.' . $service_image->getClientOriginalExtension();
        $path_service_image = $service_image->storeAs('public', $service_image_image_name);

        $service_save = new Services([
            'curator_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'amount' => str_replace(',', '', $request->input('amount')),
            'service_image' => $service_image_image_name,
        ]);

        $service_save->save();

        return redirect('services')->with('success', 'Successfully added a new carousel image');
    }

    public function message_submit(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message_save = new Message([
            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'remarks' => '',
        ]);

        $message_save->save();

        return redirect('/')->with('success', 'Successfully added a new carousel image');
    }

    public function message()
    {
        $message = Message::get();
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('message', [
            'message' => $message,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function message_reply($id)
    {
        $message = Message::find($id);
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('message_reply', [
            'message' => $message,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function message_process(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $validated = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::where('id', $request->input('message_id'))
            ->update([
                'remarks' => 'replied',
                'curator_id' => auth()->user()->id,
                'curator_reply' => $request->input('message'),
                'updated_at' => $date,
            ]);

        $subject = $request->input('subject');
        $messages = $request->input('message');
        Mail::to($request->input('email'))->send(new lacastilla_mail($subject, $messages));

        return redirect('message')->with('success', 'Message sent successfully');
    }

    public function message_view_reply($id)
    {
        $message = Message::find($id);
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('message_view_reply', [
            'message' => $message,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function schedule()
    {
        $schedule = Schedule::get();
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('schedule', [
            'schedule' => $schedule,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function schedule_process(Request $request)
    {
        //return $request->input();
        $validated = $request->validate([
            'date' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);

        $schedule = new Schedule([
            'curator_id' => auth()->user()->id,
            'status' => '',
        ]);

        $schedule->save();

        $schedule_details = new Schedule_details([
            'schedule_id' => $schedule->id,
            'date' => $request->input('date'),
            'time_from' => $request->input('time_from'),
            'time_to' => $request->input('time_to'),
            'remarks' => '',
        ]);

        $schedule_details->save();

        return redirect('schedule')->with('success', 'Schedule Successfully Added');
    }

    public function reservations()
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        $reservations = Reservations::orderBy('id', 'desc')->get();
        return view('reservation', [
            'reservation_count' => $reservation_count,
            'reservations' => $reservations,
        ]);
    }

    public function reservation_approved($id)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $user = User::find(auth()->user()->id);
        $reservation = Reservations::find($id);
        Reservations::where('id', $id)
            ->update([
                'remarks' => 'approved',
                'status' => 'approved',
                'curator_id' => auth()->user()->id,
                'validation_date' => $date,
            ]);


        $reservation_date = $reservation->sched_details->date;
        $reservation_time_from = date('h:i:s a', strtotime($reservation->sched_details->time_from));
        $reservation_time_to = date('h:i:s a', strtotime($reservation->sched_details->time_to));
        $name = $reservation->user->name;
        Mail::to($user->email)->send(new Reservation_approved($name, $reservation_date, $reservation_time_from, $reservation_time_to));
        return redirect('reservations')->with('success', 'Successfully Approved Reservation');
    }

    public function carousel_list()
    {
        $carousel = Carousel::get();
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        return view('carousel_list', [
            'carousel' => $carousel,
            'reservation_count' => $reservation_count,
        ]);
    }

    public function carousel_status($id)
    {
        $status = Carousel::find($id);

        if ($status->status == '') {
            Carousel::where('id', $id)
                ->update(['status' => 'deactivated']);
        } else {
            Carousel::where('id', $id)
                ->update(['status' => '']);
        }

        return redirect('carousel_list')->with('success', 'Successfully Carousel Status');
    }
}
