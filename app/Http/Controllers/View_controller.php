<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\Carousel;
use App\Models\Services;
use Illuminate\Http\Request;

class View_controller extends Controller
{
    public function index()
    {
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
}
