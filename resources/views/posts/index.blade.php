@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">
                <a href="/home/{{$post->id}}">{{$post->title}}</a>
                </div>
                <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$post->body}}</p>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
                </div>
            </div>
            <br>
        @endforeach
    @else
        <h1>No Posts found</h1>
    @endif
@endsection
