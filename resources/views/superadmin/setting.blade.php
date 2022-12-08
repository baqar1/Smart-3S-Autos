@extends('layouts.app')
@section('content')
<div class="body">
    <form method="POST" action="{{ route('update.admin.setting') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="name">Service Commision %</label>
                <input type="text" class="form-control" name="service_commision" value="{{old('service_commision')??$setting->service_commision}}">
                @if ($errors->has('service_commision'))
                    <span class="error">{{ $errors->first('service_commision') }}</span>
                @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="signup-email">SpareParts Commision %</label>
                <input type="text" class="form-control" name="spareparts_commision" value="{{old('spareparts_commision')??$setting->spareparts_commision}}">
                @if ($errors->has('spareparts_commision'))
                    <span class="error">{{ $errors->first('spareparts_commision') }}</span>
                @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="vehicles_commision">Vehicles Commision %</label>
                <input type="text" class="form-control" name="vehicles_commision" value="{{old('vehicles_commision')??$setting->vehicles_commision}}">
                @if ($errors->has('vehicles_commision'))
                    <span class="error">{{ $errors->first('vehicles_commision') }}</span>
                @endif
            </div>

        </div>
        
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%; margin:auto" value="Update">
    </form>
</div>
@endsection