@extends('layouts.app')
@section('content')
<style>
    .error{
        color: red;
    }
</style>
<div class="body">
    <form method="POST" action="{{ route('dealer.store') }}">
        @csrf
        <input type="hidden" name="type" value="dealer">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')??''}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label for="" style="display: block;">Status</label>
            <label class="switch">
                <input type="checkbox" name="status" class="form-control" value="1">
                <span class="slider round"></span>
            </label>
              
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none;" value="Register">
    </form>
</div>
@endsection