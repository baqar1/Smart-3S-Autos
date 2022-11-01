@extends('layouts.auth_layout')
@section('form-title','Reset')
@section('content')
<div class="body">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <div style="color: red;font-weight:500;">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="signin-email">Email</label>
            <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none;" value="Email Password Reset Link">
        <div class="bottom">
            <span>Already registered? <a href="{{route('login')}}">Login</a></span> 
        </div>
    </form>
</div>
@endsection
