@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Car's List</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 justify-content-center">
                <ul class="list-group text-center">
                    @foreach ($cars as $car)
                    <li class="list-group-item">
                        <h3>{{$car->id}}.{{$car->name}} {{$car->model}}</h3>
                        <div><strong>Sponsor:</strong>{{$car->brand->name}}</div>
                        <div><strong>Pilots:</strong></div>
                        <ul class="pilots">
                            @foreach ($car->pilots as $pilot)
                            <li><a href="{{route('pilot',$pilot->id)}}">{{$pilot->firstname}} {{$pilot->lastname}} ({{$pilot->nationality}}) </a></li>
                            @endforeach
                        </ul>
                        <div class="col-md-12 my-3">
                            <a href="{{route('editCar',$car->id)}}">
                                <button class="btn-primary">Update</button>
                            </a>
                            <a href="{{route('deleteCar',$car->id)}}">
                                <button class="btn-primary">Delete</button>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection