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
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->body}}</td>
                                <td><button class="like">Like</button></td>
                                <td>
                                    <a title="edit" class="btn  btn-sm py-0 btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                                    <a class="btn btn-sm py-0 btn-success" href="{{route('posts.show', $post->id)}}">View Post</a>
{{--                                    <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-danger">Delete</a>--}}
                                    <a href="{{ route('posts.destroy',$post->id) }}" class="btn btn-sm btn-outline-danger py-0"  id="deletePost" data-id="{{ $post->id }}">
                                        Delete
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $("body").on("click","#deletePost",function(e){

                if(!confirm("Do you really want to do this?")) {
                    return false;
                }

                e.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");
                var url = e.target;

                $.ajax(
                    {
                        url: url.href, //or you can use url: "post/"+id,
                        type: 'DELETE',
                        data: {
                            _token: token,
                            id: id
                        },
                        success: function (response){

                            $("#success").html(response.message)

                            Swal.fire(
                                'Remind!',
                                'Company deleted successfully!',
                                'success'
                            )
                        }
                    });
                return false;
            });
        });
    </script>
@endsection
