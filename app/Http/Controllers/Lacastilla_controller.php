<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use App\Models\Message;
use App\Models\About_us;
use App\Models\Inventory_logs;

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

        //return $request->input();

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
            'adapted_to_another_used' => 'adapted_to_another_used',
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
        $services = Services::get();
        return view('services', [
            'reservation_count' => $reservation_count,
            'services' => $services,
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

        return redirect('services')->with('success', 'Successfully added a new services');
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

    public function services_update($id)
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        $services = Services::find($id);
        return view('services_update', [
            'reservation_count' => $reservation_count,
            'services' => $services,
        ]);
    }

    public function services_update_process(Request $request)
    {
        //return $request->input();
        Services::where('id', $request->input('services_id'))
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'amount' => $request->input('amount'),
            ]);

        return redirect('services')->with('success', 'Successfully Updated Selected Services');
    }

    public function services_update_image(Request $request)
    {
        $service_image = $request->file('file');
        $service_image_image_name = 'service_image-' . time() . '.' . $service_image->getClientOriginalExtension();
        $path_service_image = $service_image->storeAs('public', $service_image_image_name);

        Services::where('id', $request->input('services_id'))
            ->update([
                'service_image' => $service_image_image_name,
            ]);

        return redirect('services')->with('success', 'Successfully Updated Selected Services');
    }

    public function carousel_update($id)
    {

        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        $carousel = Carousel::find($id);
        return view('carousel_update', [
            'reservation_count' => $reservation_count,
            'carousel' => $carousel,
        ]);
    }

    public function carousel_update_process(Request $request)
    {
        Carousel::where('id', $request->input('carousel_id'))
            ->update([
                'title' => $request->input('title'),
                'Note' => $request->input('note'),
            ]);

        return redirect('carousel_list')->with('success', 'Successfully Updated Selected Carousel');
    }

    public function carousel_update_image(Request $request)
    {
        $service_image = $request->file('file');
        $service_image_image_name = 'carousel_image-' . time() . '.' . $service_image->getClientOriginalExtension();
        $path_service_image = $service_image->storeAs('public', $service_image_image_name);

        Carousel::where('id', $request->input('carousel_id'))
            ->update([
                'image' => $service_image_image_name,
            ]);

        return redirect('carousel_list')->with('success', 'Successfully Updated Selected Carousel');
    }

    public function about_us()
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        $about_us = About_us::latest()->first();
        $about_count = About_us::count();
        return view('about_us', [
            'reservation_count' => $reservation_count,
            'about_us' => $about_us,
            'about_count' => $about_count,
        ]);
    }

    public function about_us_process(Request $request)
    {
        // return $request->input();
        $new = new About_us([
            'about_us' => $request->input('about_us')
        ]);

        $new->save();

        return redirect('about_us')->with('success', 'Successfully added new about us');
    }

    public function about_us_update($id)
    {
        $reservation_count = Reservations::where('status', 'Pending Approval')->count();
        $about_us = About_us::find($id);
        return view('about_us_update', [
            'reservation_count' => $reservation_count,
            'about_us' => $about_us,
        ]);
    }

    public function about_us_update_process(Request $request)
    {
        About_us::where('id', $request->input('about_us_id'))
            ->update([
                'about_us' => $request->input('about_us'),
            ]);

        return redirect('about_us')->with('success', 'Successfully Updated About Us');
    }

    public function inventory_list_update_reference_number(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'reference_number' => $request->input('reference_number'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Reference number to ' . $request->input('reference_number'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Reference Number');
    }

    public function inventory_list_update_type_object(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'type_of_object' => $request->input('type_of_object'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Type of Object to ' . $request->input('type_of_object'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Type of Object');
    }

    public function inventory_list_update_location_object(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'location_of_object' => $request->input('location_of_object'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Location of Object to ' . $request->input('location_of_object'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Location of Object');
    }

    public function inventory_list_update_description_title(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'description_title' => $request->input('description_title'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Description/Title to ' . $request->input('description_title'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Description/Title');
    }

    public function inventory_list_update_number_of_pieces(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'number_of_pieces' => $request->input('number_of_pieces'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Number of Pieces to ' . $request->input('number_of_pieces'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Number of Pieces');
    }

    public function inventory_list_update_lenght(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'length' => $request->input('lenght'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Lenght to ' . $request->input('lenght'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Lenght');
    }

    public function inventory_list_update_width(Request $request)
    {
        //return $request->input();
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'width' => $request->input('width'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change Width to ' . $request->input('width'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated Width');
    }

    public function inventory_list_update_weight(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'weight' => $request->input('weight'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change weight to ' . $request->input('weight'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated weight');
    }

    public function inventory_list_update_height(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'height' => $request->input('height'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change height to ' . $request->input('height'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated height');
    }

    public function inventory_list_update_diameter(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'diameter' => $request->input('diameter'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change diameter to ' . $request->input('diameter'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated diameter');
    }

    public function inventory_list_update_medium_material(Request $request)
    {
        //return $request->input();
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'medium_and_material' => $request->input('medium_and_material'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change medium and material to ' . $request->input('medium_and_material'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated medium and material');
    }

    public function inventory_list_update_maker_artist(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'maker_artist' => $request->input('maker_artist'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change maker/artist to ' . $request->input('maker_artist'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated maker/artist');
    }

    public function inventory_list_update_location_of_signature(Request $request)
    {
        // return $request->input();
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'location_of_signation' => $request->input('location_of_signation'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change location of signature to ' . $request->input('location_of_signation'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated location of signature');
    }

    public function inventory_list_update_date_of_birth(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'date_of_birth' => $request->input('date_of_birth'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change date of birth to ' . $request->input('date_of_birth'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated date of birth');
    }

    public function inventory_list_update_location_of_date_on_object(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'location_of_date_on_object' => $request->input('location_of_date_on_object'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change location of date on object to ' . $request->input('location_of_date_on_object'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated location of date on object');
    }

    public function inventory_list_update_writing_other_than_signature(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'writing_other_than_signature' => $request->input('writing_other_than_signature'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change writing other than signature to ' . $request->input('writing_other_than_signature'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated writing other than signature');
    }

    public function inventory_list_update_place_collected(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'place_collected' => $request->input('place_collected'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change place collected to ' . $request->input('place_collected'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated place collected');
    }

    public function inventory_list_update_date_received(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'date_received' => $request->input('date_received'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change date received to ' . $request->input('date_received'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated date received');
    }

    public function inventory_list_update_original_as_shown(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'original_as_shown' => $request->input('original_as_shown'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change original as shown to ' . $request->input('original_as_shown'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated original as shown');
    }

    public function inventory_list_update_object_original_used(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'object_original_used' => $request->input('object_original_used'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change object original to ' . $request->input('object_original_used'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated object original used');
    }

    public function inventory_list_update_date_receipt(Request $request)
    {
        //return $request->input();
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'receipt' => $request->input('receipt'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change date receipt to ' . $request->input('receipt'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated date receipt used');
    }

    public function inventory_list_update_item_description(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'item_description' => $request->input('item_description'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change item description to ' . $request->input('item_description'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated item description used');
    }

    public function inventory_list_update_condition_of_object(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'condition_of_object' => $request->input('condition_of_object'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change condition of object to ' . $request->input('condition_of_object'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated condition of object');
    }

    public function inventory_list_update_history(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'history' => $request->input('history'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change history to ' . $request->input('history'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated history');
    }

    public function inventory_list_update_purchase_or_received(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'purchase_or_received' => $request->input('purchase_or_received'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change purchase_or_received to ' . $request->input('purchase_or_received'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated purchase_or_received');
    }

    public function inventory_list_update_personal_story_of_this_object(Request $request)
    {
        Inventory::where('id', $request->input('inventory_id'))
            ->update([
                'personal_story_of_this_object' => $request->input('personal_story_of_this_object'),
            ]);

        $new = new Inventory_logs([
            'curator_id' => auth()->user()->id,
            'inventory_id' => $request->input('inventory_id'),
            'logs' => 'Change personal_story_of_this_object to ' . $request->input('personal_story_of_this_object'),
        ]);

        $new->save();

        return redirect('inventory_list')->with('success', 'Successfully Updated personal_story_of_this_object');
    }

}
