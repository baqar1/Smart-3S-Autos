@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="main-wrapper">

        <!--form layout-->

        <div class="row">
            <div class="col">
                <h5 class="card-title">Vehicles</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="text-light bg-dark" style="text-align: center; padding: 10px; margin-top: 5px;"> @if($vehicle->exists) Edit Vehicle @else Add New Vehicle @endif</h4>
                        </div>
                        @if ($vehicle->exists && $imageCount<= 0)
                        <h5 class="error" style="text-align: center; padding: 10px; margin-top: 5px;">You must upload image to publish this Vehicle</h5>
                        @endif
                        <form action="{{route('vehicle.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$vehicle->id??''}}">
                            <div class="row mt-3 justify-content-around">
                                <div class="col-10 col-md-11 col-lg-11 mb-3">
                                    <div class="row mt-5">
                                        
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Vehicle Name</label>
                                            <input type="text" name="vehicle_name" value="{{old('vehicle_name')??$vehicle->vehicle_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_name'))
                                                <span class="error">{{ $errors->first('vehicle_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Model Name</label>
                                            <input type="text" name="vehicle_model" value="{{old('vehicle_model')??$vehicle->vehicle_model}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_model'))
                                                <span class="error">{{ $errors->first('vehicle_model') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Color</label>
                                            <input type="text" name="color" value="{{old('color')??$vehicle->color}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('color'))
                                                <span class="error">{{ $errors->first('color') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Fuel Average</label>
                                            <input type="text" name="fuel_average" value="{{old('fuel_average')??$vehicle->fuel_average}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('fuel_average'))
                                                <span class="error">{{ $errors->first('fuel_average') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Mileage</label>
                                            <input type="text" name="mileage" value="{{old('mileage')??$vehicle->mileage}}" class="form-control shadow-sm"  aria-label="">
                                            @if ($errors->has('mileage'))
                                                <span class="error">{{ $errors->first('mileage') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Features</label>
                                            <input type="text" name="features" value="{{old('features')??$vehicle->features}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('features'))
                                                <span class="error">{{ $errors->first('features') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <label  class="form-label">Select Dealer</label>
                                            <select class="form-control" name="dealer_id" >
                                                    <option value="">Select</option>
                                                @foreach ($dealers  as $dealer)
                                                    @if($vehicle->exists)
                                                        <option value="{{$dealer->id}}" {{($dealer->id==$vehicle->dealer_id)?'selected':''}}>{{$dealer->name}}</option>
                                                    @else
                                                        <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @if ($errors->has('dealer_id'))
                                                <span class="error">{{ $errors->first('dealer_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" value="{{old('phone')??$vehicle->phone}}" class="form-control shadow-sm"  aria-label="">
                                            @if ($errors->has('phone'))
                                                <span class="error">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="price" value="{{old('price')??$vehicle->price}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('price'))
                                                <span class="error">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-lg-6">
                                            <label  class="form-label">Address</label>
                                            <textarea class="form-control" name="address"  cols="30" rows="3">{{old('address')??$vehicle->address}}</textarea>
                                
                                            @if ($errors->has('address'))
                                                <span class="error">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12 col-lg-12">
                                            <label  class="form-label">Description</label>
                                            <textarea class="form-control" name="vehicle_description" cols="30" rows="10">{{old('vehicle_description')??$vehicle->vehicle_description}}</textarea>
                                            @if ($errors->has('vehicle_description'))
                                                <span class="error">{{ $errors->first('vehicle_description') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>

    
                                </div>
                                <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%" value="@if($vehicle->exists)Update @else Submit @endif">
                            </div>

                        </form>

                        @if($vehicle->exists)
                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-12">
                                @include('components.image',['smart_id'=>$vehicle->id])
                            </div>

                        </div>
                        @endif
                        
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection