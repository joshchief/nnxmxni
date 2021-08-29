@extends('layouts.app')

@section('content')
<form action="/edit" method="POST" id="edit">
    @csrf
    @include('messages.alert')
    <input type="hidden" name="id" value="{{$post->id}}">
    <div class="form-group">
      <label for="exampleFormControlInput1" style="font-weight: 800; text-transform: uppercase;">Title:</label >
      <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1" style="font-weight: 800; text-transform: uppercase;">Body:</label>
      <textarea class="form-control" name="body" id="body" rows="8">{{$post->body}}</textarea><br>
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </form>
@endsection