@extends('layouts.auth_layout')
@section('form-title','Login')
@section('content')
<div class="body">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <div style="color: red;font-weight:500;">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="signin-email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="signin-password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
                <input type="checkbox">
                <span>Remember me</span>
            </label>
        </div>
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none;" value="Login">
        <div class="bottom">
            <span class="helper-text m-b-10 m-t-5">
                <i class="fa fa-lock"></i>
                <a href="{{route('password.request')}}">Forgot password?</a>
            </span>
            <span>Don't have an account? <a href="{{route('register')}}">Register</a></span> 
        </div>
    </form>
</div>
@endsection
