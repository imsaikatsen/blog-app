@extends('layouts.master')
@section('content')
        <div class="card">
            <div class="card-body">
                <div>
                    <h1 class="title">{{ $post->title }} </h1>
                        <p class="date">{{$post->created_at}}</p>
                        <h6 class=""><span>Created By: </span>{{$post->author->name}}</h6>
                    <span class="body"> {{ $post->body }} </span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{url("comment/store",$post->id)}}" method="post">
                    {{ csrf_field() }}
                    <textarea name='body'class="form-control"></textarea>
                    <button class="form-control">Submit</button>
                </form>
                <div>
                    @foreach($post->comments as $comment)
                        <h5 class="lead text-justify" >{{$comment->body}}</h5>
                        <p>{{$comment->author->name}}</p>
                        <p>{{date('j M, Y, g:i a', strtotime($comment->created_at))}}</p>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
