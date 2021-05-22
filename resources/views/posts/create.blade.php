@extends('layouts.app')

@section('content')
  <form action="/" method="POST">
    @csrf
    @include('messages.alert')
    <input type="hidden" name="id">
    <div class="form-group">
      <label for="exampleFormControlInput1" style="font-weight: 800; text-transform: uppercase;">Title:</label >
      <input type="text" class="form-control" name="title" id="title" placeholder="title">
    </div>
    <div class="form-group">
      <label for="editor" style="font-weight: 800; text-transform: uppercase;">Body:</label>
      <textarea class="form-control" name="body" id="editor" rows="8"></textarea><br>
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </form>
@endsection

@section('ck-editor')
  <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@endsection