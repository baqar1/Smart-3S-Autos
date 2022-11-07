@extends('layouts.app')
@section('content')
<div class="body">
    <form method="POST" action="{{ route('dealer.store') }}">
        @csrf
        <input type="hidden" name="type" value="dealer">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')??''}}" placeholder="Name">
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            @if ($errors->has('email'))
                <span class="error">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            @if ($errors->has('password_confirmation'))
                <span class="error">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" style="display: block;">Status</label>
            <label class="switch">
                <input type="checkbox" name="status" class="form-control" value="1">
                <span class="slider round"></span>
            </label>
            @if ($errors->has('status'))
                <span class="error">{{ $errors->first('status') }}</span>
            @endif
              
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:50%; margin:auto" value="Register">
    </form>
</div>
@endsection