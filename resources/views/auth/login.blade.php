@extends('layouts.app')
@section('style')
   
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<style>
    body{
background-color: #080710 !important;
}
</style>
@endsection
@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="{{route("login")}}" method="Post" class="login-form">
    @csrf
    <h3>Login Here</h3>

    <label for="username">Username</label>
    <input type="text" placeholder="Email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    <label for="password">Password</label>
    <input type="password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    <button class="mt-4">Log In</button>
    <div class="social">
     <h6 class="mt-2">Dont Have Accout</h6>
      <div class="fb"><a href="{{route('register')}}">Register</a></div>
    </div>
</form>
@endsection
