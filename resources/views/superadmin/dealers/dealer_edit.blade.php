@extends('layouts.app')
@section('content')
<style>
    .error{
        color: red;
    }
</style>
<div class="body">
    
    <form method="POST" action="{{ route('dealer.update',[$dealer->id]) }}">
        @csrf
        <input type="hidden" name="type" value="dealer">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')??$dealer->name}}" placeholder="Name">
            @if ($errors->has('name'))
                <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" class="form-control" name="email" value="{{$dealer->email}}" placeholder="Email">
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
            <label for="" style="display: block;">Status</label>
            <label class="switch">
                <input type="checkbox" name="status" class="form-control" value="1" {{($dealer->status =='1')?'checked':''}}>
                <span class="slider round"></span>
            </label>
              
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none; width:25%;margin:auto" value="Update">
    </form>
</div>
@endsection