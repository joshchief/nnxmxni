@extends('layouts.app')

@section('content')
<div id="article">
    <a href="/create" class="btn btn-primary mb-2 float-right">Create Post</a><br><br>
    <table class="table table-striped">
        @if (count($posts) > 0)
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            @foreach ($posts as $post)
                <tbody>
                    <tr>
                    <th scope="col">#</th>
                    <td><a href="/home/{{$post->id}}">{{Str::limit($post->title, 40)}}</a></td>
                    <td><a href="/edit/{{$post->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a href="/delete/{{$post->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
            @endforeach  
        @else
            <p>No Post</p>
        @endif
    </table>
</div>
    
@endsection
