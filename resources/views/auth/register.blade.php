@extends('layouts.app')
@section('style')
    <style>
        body {
            background-color: #080710 !important;
        }
    </style>
@endsection
@section('content')
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form action="{{ route('register') }}" method="POST" class="mt-4 login-form">
        @csrf
        <h3>Register Here</h3>
        <div class="row">
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="text" placeholder="Name" class=" @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            <div class="col-md-6">
                <label for="username">Email</label>
                <input type="text" placeholder="Email" class="@error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
            </div>
            <div class="col-md-6">

                <label for="password">Password</label>
                <input type="password" placeholder="Password" class=" @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
            </div>
            <div class="col-md-6">


                <label for="password">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" id="password-confirm" name="password_confirmation">
            </div>
        </div>


        <button class="mt-4" type="submit">Register Now</button>
        <div class="social">
            <h6 class="mt-2">Have Accout</h6>
            <div class="fb"><a href="{{ route('login') }}">Login</a></div>
        </div>
    </form>
@endsection
