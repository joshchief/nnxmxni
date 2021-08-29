@extends('layouts.app')

@section('content')
  <form action="{{ route('signUp')}}" method="POST">
    @csrf
    
      <div class="card">
        @include('messages.alert')
          <div class="card-header">
              <h2>Register</h2>
          </div>
          <div class="card-body">
            <div>
              <label for="name"> <strong>Name</strong> :</label>
              <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name')}}"
                placeholder="Enter name"
               required
              /> 
                @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div>
                <label for="email"> <strong>Email Address</strong> :</label>
              <input
                type="email"
                id="email"
                name="email"
                value="{{old('email')}}"
                placeholder="Enter email"
                autofocus
                required
              />
              @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
              
              <div>
                 <label for="password"> <strong>Password</strong> :</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Enter password"
                  autofocus
                  required
                />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>

              <div>
                <label for="password_confirmation"> <strong>Confirm Password</strong> :</label>
                <input
                  type="password"
                  id="password_confirmation"
                  name="password_confirmation"
                  placeholder="Confirm password"
                  required
                />
            </div>
             
            <p>By creating an account you agree to our <a href="#"> Terms & Policy</a></p>
            <button id="reg-btn">Register</button>
            <div class="container signin">
              <p>Already have an account? <a href="/login">Sign in</a>.</p>
            </div>
          </div>
        </div>
  </form>
@endsection