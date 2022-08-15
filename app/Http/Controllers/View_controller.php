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
        return view('welcome',[
            'carousel' => $carousel,
            'carousel_first' => $carousel_first,
        ]);
    }
}
