@extends('layouts.master')
@section('content')

    <div class="wrapper">
        <div>
            <h2>Create Post</h2>
        </div>
    <form action="/posts" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
    <input required="required"  type="text" name = "title" class="form-control" />
    </div>

    <div class="form-group">
    <textarea name='body'class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control form-control-file" id="image">
    </div>

    <input type="submit" name='save' class="btn btn-success" value = "Save" />

    </form>
    </div>
@endsection
