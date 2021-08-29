@extends('layouts.app')

@section('content')

    <div class="article">
        <br>
        <br>
        <article>
            <h2 class="title">
                {{$post->title}}
            </h2>

            <hr>

            <div class="post-meta">
                <span>{{$post->created_at->format('M d, Y')}}</span>
            </div>

            
            <br>

            <div class="body">
                <p class="lead">{!!$post->body!!}</p>
            </div>
        </article>
       
        {{-- <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h1 class="title">{{$post->title}}</h1>
            <h5>{{$post->created_at->format('M d, Y')}}/ by </h5><h6>{{$post->user->name}}</h6>
            <p class="lead">{!!$post->body!!}</p>
            </div> --}}

        @if (!Auth::guest())
            @if (Auth::id() == $post->user_id)
                <a href="/edit/{{$post->id}}" class="btn btn-primary mb-2">Edit</a>
                <a href="/delete/{{$post->id}}" class="btn btn-danger float-right">Delete</a>
            @endif
        @endif  
    </div>
@endsection