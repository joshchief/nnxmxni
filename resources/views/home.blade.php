@extends('layouts.app')

@section('content')

    <div class="article">
        @if (count($posts) > 0)
        @include('messages.alert')
            @foreach ($posts as $post)
                <h3 class="title">{{$post->title}}</h3>
                <h6>{{$post->created_at->format('M d, Y')}} | <span>{{$post->user->name}}</span></h6>
                <br>
                <p>{!!Str::limit($post->body, 400)!!}  <a href="/home/{{$post->id}}" class="read-more">read more</a></p>
                <br>
            @endforeach
        @else
            <h1>No Post</h1>
        @endif
    </div>
@endsection
