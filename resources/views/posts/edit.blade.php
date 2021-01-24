@extends('layouts.master')
@section('content')
    <div class="wrapper">
      <div><h2>Edit Post</h2></div>
        <form action="{{url("posts",$post->id)}}" id="myForm" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input required="required" value="{{ $post->title}}" type="text" name = "title" class="form-control"/>
            </div>

            <div class="form-group">
                <textarea name='body'class="form-control">{{ $post->body }}</textarea>
            </div>
            <input type="submit" name='update' class="btn btn-success"/>
        </form>
    </div>
@endsection
