<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

class TestController extends Controller
{
    public function homepage(){

        $cars=Car::all();
        return view('pages.homepage', compact('cars'));
    }

    public function pilot($id){

        $pilot=Pilot::findOrFail($id);
        return view('pages.pilot',compact('pilot'));
    }

    public function createCar(){

        $brands=Brand::all();
        $pilots=Pilot::all();
        return view('pages.createCar',compact('brands','pilots'));
    }

    public function storeCar(Request $request){

        $validated= $request->validate([
            'name'=>'required|min:3',
            'model'=>'required|min:3',
            'kW'=>'required|integer|min:50|max:250',
            'brand_id'=>'required|integer|exists:brands,id',
            // 'pilots_id'=>'required|integer'
        ]);

        $brand= Brand::findOrFail($request->brand_id);
        $car=Car::make($validated);
        $car->brand()->associate($brand);
        $car->save();

        $pilots=Pilot::findOrFail($request->pilots_id);
        $car->pilots()->attach($pilots);
        $car->save();

        return redirect()->route('homepage');
    }

    public function editCar($id){

        $car= Car::findOrFail($id);
        $brands=Brand::all();
        $pilots=Pilot::all();
        return view('pages.editCar', compact('car','brands','pilots'));
    }

}