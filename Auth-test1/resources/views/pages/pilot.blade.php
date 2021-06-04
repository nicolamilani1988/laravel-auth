@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>{{$pilot->firstname}} {{$pilot->lastname}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 justify-content-center">
                <h4 class="text-center">Nationality: {{$pilot->nationality}}</h4>
                <h3 class="text-center">Driven cars:</h3>
                <ul class="cars list-group text-center">
                    @foreach ($pilot->cars as $car)
                        <li>
                            {{$car->name}} {{$car->model}} ({{$car->kW}})
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection