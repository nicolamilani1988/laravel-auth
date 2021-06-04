@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$car->name}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{$car->model}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kW" class="col-md-4 col-form-label text-md-right">Kilowatt</label>

                            <div class="col-md-6">
                                <input id="kW" type="number" class="form-control @error('kW') is-invalid @enderror" name="kW" value="{{$car->kW}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_id" class="col-md-4 col-form-label text-md-right">Brand</label>
                            <div class="col-md-6">
                                <select name="brand_id" id="brand_id" required>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}"
                                        @if ($car->brand->id == $brand->id)
                                            selected
                                        @endif
                                    >{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pilots_id[]" class="col-md-4 col-form-label text-md-right">Piloti</label>
                            <div class="col-md-6">
                                <select name="pilots_id[]" id="pilots_id[]" required multiple>
                                    @foreach ($pilots as $pilot)
                                    <option value="{{$pilot->id}}"
                                    @foreach ($pilot->cars as $carPilot)
                                        @if ($carPilot->id == $car->id)
                                           selected 
                                        @endif
                                    @endforeach
                                    
                                    >{{$pilot->firstname}} {{$pilot->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection