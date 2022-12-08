@extends('layouts.dealers')
@section('content')
<div class="page-content">
    <div class="main-wrapper">

        <!--form layout-->

        <div class="row">
            <div class="col">
                <h5 class="card-title">Spare Parts</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="text-light bg-dark" style="text-align: center; padding: 10px; margin-top: 5px;"> @if($spare->exists) Edit Spare Parts @else Add New Spare Parts @endif</h4>
                        </div>
                        <form action="{{route('dealers.spare.parts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$spare->id??''}}">
                            <input type="hidden"name='dealer_id' value="{{Auth::user()->id}}">
                            <div class="row mt-3 justify-content-around">
                                <div class="col-10 col-md-11 col-lg-11 mb-3">
                                    <div class="row mt-5">
                                        
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Vehicle Name</label>
                                            <input type="text" name="vehicle_name" value="{{old('vehicle_name')??$spare->vehicle_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('vehicle_name'))
                                                <span class="error">{{ $errors->first('vehicle_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Part Name</label>
                                            <input type="text" name="part_name" value="{{old('part_name')??$spare->part_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('part_name'))
                                                <span class="error">{{ $errors->first('part_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Condition</label>
                                            <input type="text" name="part_condition" value="{{old('part_condition')??$spare->part_condition}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('part_condition'))
                                                <span class="error">{{ $errors->first('part_condition') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Part ID</label>
                                            <input type="text" name="part_id" value="{{old('part_id')??$spare->part_id}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('part_id'))
                                                <span class="error">{{ $errors->first('part_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" value="{{old('phone')??$spare->phone}}" class="form-control shadow-sm"  aria-label="">
                                            @if ($errors->has('phone'))
                                                <span class="error">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="price" value="{{old('price')??$spare->price}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('price'))
                                                <span class="error">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="row mt-3">
                                        <div class="col-md-12 col-lg-12">
                                            <label  class="form-label">Address</label>
                                            <input type="text" name="address" value="{{old('address')??$spare->address}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('address'))
                                                <span class="error">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
    
                                    <div class="row mt-3">
                                        
                                        <div class="col-md-6 col-lg-6">
                                            <label  class="form-label">Workshop Name</label>
                                            <input type="text" name="workshop_name" value="{{old('workshop_name')??$spare->workshop_name}}" class="form-control shadow-sm" aria-label="">
                                            @if ($errors->has('workshop_name'))
                                                <span class="error">{{ $errors->first('workshop_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label class="form-label">SpareParts Image</label>
                                                @if($spare->exists)
                                                <img src="{{asset('images/')}}/{{$spare->img}}" class="img-fluid" width="150">
                                                @endif
                                            </div>
                                            <input class="form-control shadow-sm" type="file" name="img">
                                        </div>
                                    </div>
    
                                </div>
                                <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%" value="@if($spare->exists)Update @else Submit @endif">
                            </div>

                        </form>
                        
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection