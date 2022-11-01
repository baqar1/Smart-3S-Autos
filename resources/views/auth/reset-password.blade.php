@extends('layouts.auth_layout')
@section('form-title','Reset')
@section('content')
<div class="body">
    <!-- Validation Errors -->
    <div style="color: red;font-weight:500;">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
    
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        
        <input  type="submit" class="btn btn-primary btn-lg btn-block" style="background: linear-gradient(-60deg, #3DA9FC 50%, #FF8C67 50%); border: none;" value="Reset">
        <div class="bottom">
            <span>Already registered? <a href="{{route('login')}}">Login</a></span> 
        </div>
    </form>
</div>
@endsection
