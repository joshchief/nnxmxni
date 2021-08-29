@extends('layouts.app')

@section('content')
    <form action="{{route('forgot.password.post')}}" method="POST">
        @csrf
        <div class="card">        
            @include('messages.alert')          
            <div class="card-header">
                <h2>PASSWORD RESET LINK</h2>
            </div>
            <div class="card-body">
        
                <label for="email"> <strong>Email Address</strong> :</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Enter email"
                    required
                    autofocus
                />
                <button id="reg-btn">SEND PASSWORD RESET LINK</button>
            </div>
        </div>
    </form>
@endsection
