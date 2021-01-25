@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div><h1>All Posts</h1></div>
                </div>
                <div class="col-md-4">
                    <form action="{{url('posts/search')}}" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" value="{{request('search')}}" type="search"  name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <a class="nav-link float-right btn btn-info"  href="{{ url('posts/create') }}">Create Post</a>
                </div>
                <hr>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td>
                                    @if($post->image)
                                        <img src="{{ asset('upload/blog_images/'.$post->image)}}" height="100px" width="120px">
                                    @endif
                                </td>
                                <td>
                                    <a title="edit" class="btn  btn-sm py-0 btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                                    <a class="btn btn-sm py-0 btn-success" href="{{route('posts.show', $post->id)}}">View</a>
                                    <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-sm py-0 btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
