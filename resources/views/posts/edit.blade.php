@extends('layouts.app')

@section('content')
<form action="/home" method="POST">
    @csrf
    @include('messages.alert')
    <div class="form-group">
      <label for="exampleFormControlInput1">Title:</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Body:</label>
      <textarea class="form-control" name="body" id="body" rows="8">{{$post->body}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>
@endsection