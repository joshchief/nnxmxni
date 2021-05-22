@extends('layouts.app')

@section('content')
    <div id="article">
        @if (count($posts) > 0)
        @include('messages.alert')
            @foreach ($posts as $post)
                <h1 class="title">{{$post->title}}</h1>
                <h5>{{$post->created_at->format('M d, Y')}} / by </h5><h6>{{$post->user->name}}</h6>
                <p>{!!Str::limit($post->body, 400)!!} <br><br> <a href="/home/{{$post->id}}" class="btn btn-primary btn-sm">Read more</a></p>
                <br>
            @endforeach
        @else
            <h1>No Post</h1>
        @endif
    </div>
@endsection
