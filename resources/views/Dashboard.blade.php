@extends('layouts.app')

@section('content')
    <div id="article">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <h1 class="title">{{$post->title}}</h1>
                <h6>{{$post->created_at}}</h6>
                <p>{{Str::limit($post->body, 400)}} <br> <a href="/home/{{$post->id}}" class="btn btn-primary btn-sm">Read more</a></p>
            @endforeach
        @else
            <h1>No Post</h1>
        @endif
    </div>
    
@endsection
