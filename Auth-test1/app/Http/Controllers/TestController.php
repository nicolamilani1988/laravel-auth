<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

class TestController extends Controller
{
    public function homepage(){

        $cars=Car::where('deleted',false) ->get();
        return view('pages.homepage', compact('cars'));
    }

    public function pilot($id){

        $pilot=Pilot::findOrFail($id);
        return view('pages.pilot',compact('pilot'));
    }

}
