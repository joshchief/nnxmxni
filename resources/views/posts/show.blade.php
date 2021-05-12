@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->body}}</p>
        </div>
    </div>
    <a href="/edit/{{$post->id}}">
        <button type="submit" class="btn btn-primary mb-2">Edit</button>
    </a>
    <form action="" method="POST">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-danger " value="delete">
    </form>
@endsection