@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->body}}</p>
        </div>
    </div>
@endsection
