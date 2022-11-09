@extends('layouts.dealers')
@section('content')
<div class="body">
    <form method="POST" action="{{ route('dealers.profile.update',[$dealer]) }}">
        @csrf
        <input type="hidden" name="type" value="super-admin">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')??$dealer->name}}">
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" class="form-control" readonly name="email" value="{{old('email')??$dealer->email}}">
            @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" class="form-control" name="password">
            @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
            @endif
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%; margin:auto" value="Update">
    </form>
</div>
@endsection