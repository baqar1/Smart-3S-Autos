@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="main-wrapper">

        <!--form layout-->

        <div class="row">
            <div class="col">
                <h5 class="card-title">Services</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="text-light bg-dark" style="text-align: center; padding: 10px; margin-top: 5px;"> @if($service->exists) Edit Service @else Add New Service @endif</h4>
                        </div>
                        <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$service->id??''}}">
                            <div class="row mt-3 justify-content-around">
                                <div class="col-10 col-md-11 col-lg-11 mb-3">
                                    <div class="row mt-5">
                                        
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Service Name</label>
                                            <input type="text" name="service_name" value="{{old('service_name')??$service->service_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('service_name'))
                                                <span class="error">{{ $errors->first('service_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-2 col-lg-2">
                                            <label class="form-label">Service Charges</label>
                                            <input type="text" name="service_charges" value="{{old('service_charges')??$service->service_charges}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('service_charges'))
                                                <span class="error">{{ $errors->first('service_charges') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Service Date</label>
                                            <input type="date" name="service_date" value="{{old('service_date')??$service->service_date}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('service_date'))
                                                <span class="error">{{ $errors->first('service_date') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Service Time</label>
                                            <input type="time" name="service_time" value="{{old('service_time')??$service->service_time}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('service_time'))
                                                <span class="error">{{ $errors->first('service_time') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Vehicle Type</label>
                                            <input type="text" name="vehicle_type" value="{{old('vehicle_type')??$service->vehicle_type}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_type'))
                                                <span class="error">{{ $errors->first('vehicle_type') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Vehicle Model</label>
                                            <input type="text" name="vehicle_model" value="{{old('vehicle_model')??$service->vehicle_model}}" class="form-control shadow-sm"  aria-label="">
                                            @if ($errors->has('vehicle_model'))
                                                <span class="error">{{ $errors->first('vehicle_model') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Vehicle Name</label>
                                            <input type="text" name="vehicle_name" value="{{old('vehicle_name')??$service->vehicle_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_name'))
                                                <span class="error">{{ $errors->first('vehicle_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label class="form-label">Vehicle Number</label>
                                            <input type="text" name="vehicle_number" value="{{old('vehicle_number')??$service->vehicle_number}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_number'))
                                                <span class="error">{{ $errors->first('vehicle_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-lg-6">
                                            <label  class="form-label">Select Dealer</label>
                                            <select class="form-control" name="dealer_id" >
                                                    <option value="">Select</option>
                                                @foreach ($dealers  as $dealer)
                                                    @if($service->exists)
                                                        <option value="{{$dealer->id}}" {{($dealer->id==$service->dealer_id)?'selected':''}}>{{$dealer->name}}</option>
                                                    @else
                                                        <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @if ($errors->has('dealer_id'))
                                                <span class="error">{{ $errors->first('dealer_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <label  class="form-label">Service Detail</label>
                                            <textarea class="form-control" name="service_detail" cols="30" rows="5">{{old('service_detail')??$service->service_detail}}</textarea>
                                            @if ($errors->has('service_detail'))
                                                <span class="error">{{ $errors->first('service_detail') }}</span>
                                            @endif
                                        </div>
                                       
                                    </div>
    
                                </div>
                                <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%" value="@if($service->exists)Update @else Submit @endif">
                            </div>

                        </form>
                        
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection