@extends('layouts.app')


@section('content')
<form action="{{ route('reset.password.post') }}" method="POST">
    @csrf
    <div class="card">        
        @include('messages.alert')          
        <div class="card-header">
            <h2>Reset Password</h2>
        </div>
        <div class="card-body">

            <input type="hidden" name="token" value="{{ $token }}">
    
            <label for="email"> <strong>Email Address</strong> :</label>
            <input
                type="text"
                id="email"
                name="email"
                placeholder="Enter email"
                autofocus
            />
            <label for="password"> <strong>Password</strong> :</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
                autofocus
            />

            <label for="password_confirmation"> <strong>Confirm Password</strong> :</label>
              <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm password"
                required
                autofocus
              />


            <button id="reg-btn">Reset Password</button>
    </form>
@endsection
