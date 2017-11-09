@extends('layouts.blog-post')

@section('content')

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://localhost/cms/public/images/{{$post->photo->photo_path}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"> {{$post->body}} </p>

                <hr>

                <!-- Blog Comments -->
                @if(Auth::check())
                <!-- Comments Form -->             
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['methor'=> 'POST' , 'action'=> 'AdminCommentController@store' ]) !!}

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    {!! Form::label('body' , 'Body :') !!}

                    {!! Form::textarea('body' , null , ['class'=> 'form-control' , 'rows' => 4]) !!}

                    {!! Form::submit('Comment' , ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
                @endif
                <hr>

                <!-- Posted Comments -->



                <!-- Comment -->
                @if(count($comments) > 0 )
                @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="50px" src="http://localhost/cms/public/images/{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}

                        <!-- Nested Comment -->
                      @if(count($comment->reply) > 0 )
                      @foreach($comment->reply as $reply)
                       @if($reply->is_active == 1)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="50px" src="http://localhost/cms/public/images/{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$reply->body}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        <div class="form-group">

                        {!! Form::open(['methor'=> 'POST' , 'action'=> 'AdminCommentReplyController@createReply' ]) !!}

                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                        {!! Form::label('body_reply' , 'Body :') !!}

                        {!! Form::textarea('body' , null , ['class'=> 'form-control' , 'id'=> 'body_reply'  , 'rows' => 4]) !!}

                        {!! Form::submit('Comment' , ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}

                        </div>

                        <!-- End Nested Comment -->
                    </div>
                </div>
                @endforeach
                @endif

            </div>

@endsection