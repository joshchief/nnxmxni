@extends('layouts.app')

@section('content')
<div id="article">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->body}}</p>
        </div>
    </div>
    <a href="/edit/{{$post->id}}">
        <button type="submit" class="btn btn-primary mb-2">Edit</button>
    </a>
    <a href="/delete/{{$post->id}}" class="btn btn-danger float-right">Delete</a>
</div>
    
    
@endsection