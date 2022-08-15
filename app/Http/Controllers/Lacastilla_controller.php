<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use App\Models\Message;
use Illuminate\Http\Request;

class Lacastilla_controller extends Controller
{
    public function inventory_list()
    {
        $inventory = Inventory::get();
        return view('inventory_list', [
            'inventory' => $inventory,
        ]);
    }

    public function inventory_add()
    {
        return view('inventory_add');
    }

    public function inventory_add_save(Request $request)
    {
        //return $request->all();

        $validated = $request->validate([
            'type_of_object' => 'required',
            'location_of_object' => 'required',
            'description_title' => 'required',
            'number_of_pieces' => 'required',
            'length' => 'required',
            'width' => 'required',
            'dimension' => 'required',
            'medium_and_material' => 'required',
            'maker_artist' => 'required',
            'location_of_signation' => 'required',
            'date_of_birth' => 'required',
            'location_of_date_on_object' => 'required',
            'writing_other_than_signature' => 'required',
            'place_of_origin' => 'required',
            'place_collected' => 'required',
            'date_received' => 'required',
            'original_as_shown' => 'required',
            'object_original_used' => 'required',
            'receipt' => 'required',
            'item_description' => 'required',
            'condition_of_object' => 'required',
            'history' => 'required',
            'purchase_or_received' => 'required',
            'personal_story_of_this_object' => 'required',
            'inventory_image' => 'required',
        ]);



        $inventory_image = $request->file('inventory_image');
        $inventory_image_name = $inventory_image->getClientOriginalName();
        $inventory_image_file_type = $inventory_image->getClientmimeType();
        $inventory_image->move(public_path() . '/upload_image/', $inventory_image_name);


        $inventory_save = new Inventory([
            'curator_id' => auth()->user()->id,
            'type_of_object' => $request->input('type_of_object'),
            'location_of_object' => $request->input('location_of_object'),
            'description_title' => $request->input('description_title'),
            'number_of_pieces' => $request->input('number_of_pieces'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'dimension' => $request->input('dimension'),
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
        return view('carousel');
    }

    public function carousel_save(Request $request)
    {
        //return $request->input();

        $validated = $request->validate([
            'title' => 'required',
            'note' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image_file_type = $image->getClientmimeType();
        $image->move(public_path() . '/upload_image/', $image_name);

        $carousel_saved = new Carousel([
            'title' => $request->input('title'),
            'note' => $request->input('note'),
            'image' => $image_name,
            'curator_id' => auth()->user()->id,
        ]);

        $carousel_saved->save();

        return redirect('carousel')->with('success', 'Successfully added a new carousel image');
    }

    public function services()
    {
        return view('services');
    }

    public function services_save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'service_image' => 'required',
            'amount' => 'required|numeric|between:0,9999.99',
        ]);

        $service_image = $request->file('service_image');
        $service_image_name = $service_image->getClientOriginalName();
        $service_image_file_type = $service_image->getClientmimeType();
        $service_image->move(public_path() . '/upload_image/', $service_image_name);

        $service_save = new Services([
            'curator_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'amount' => str_replace(',', '', $request->input('amount')),
            'service_image' => $service_image_name,
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
}
