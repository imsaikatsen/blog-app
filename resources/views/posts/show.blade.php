@extends('layouts.master')
@section('content')
        <div class="card">
            <div class="card-body">
                <div>
                    <h1 class="title">{{ $post->title }} </h1>
                        <p class="date">{{$post->created_at}}</p>
                        <h6 class=""><span>Created By: </span>{{$post->author->name}}</h6>
                    <span class="body"> {{ $post->body }} </span>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Send Mail
                    </button>

                    <form action="{{url('sendmail/send',$post->id)}}" method="post">
                        {{ csrf_field() }}
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Send To</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-info" href="{{ URL('/posts/pdf',$post->id) }}">Download PDF</a>
                    </div>
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
