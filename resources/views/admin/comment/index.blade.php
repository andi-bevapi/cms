@extends('layouts.admin')

@section('content')

@if($comments)
<table class="table">
    <thead>
      <tr>
    <th>Id</th>
    <th>Author</th>
    <th>Photo</th>
    <th>Email</th>
    <th>Body</th>
    <th>View Post</th>
    <th>View Reply</th>
    <th>Approve</th>
    <th>Delete Comment</th>
    </tr>
    </thead>

    <tbody>
    @foreach($comments as $comment)
      <tr>
      <td>{{ $comment->id }}</td>
      <td>{{ $comment->author }} </td>
      <td> <img height="50" src="http://localhost/cms/public/images/{{ $comment->photo }}" > </td>
      <td> {{ $comment->email }} </td>
      <td> {{ $comment->body }} </td>
      <td> <a href=" {{route('home.post' , $comment->post->id)}} "> View Post </a> </td>
      <td> <a href="{{ route('reply.show' , $comment->id) }}">View Reply</a> </td>
      <td>

      @if($comment->is_active == 0)

      {!! Form::open([ 'method' => 'PATCH' , 'action' => ['AdminCommentController@update' , $comment->id ] ]) !!}

      <input type="hidden" name="is_active" value="1">

      {!! Form::submit('Approve' , ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
      
      @else($comment->is_active == 1)

      {!! Form::open([ 'method' => 'PATCH' , 'action' => ['AdminCommentController@update' , $comment->id ] ]) !!}

      <input type="hidden" name="is_active" value="0">

      {!! Form::submit('Un approve' , ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}

      @endif
      </td>
      <td>

      {!! Form::open([ 'method' => 'DELETE' , 'action' => ['AdminCommentController@destroy' , $comment->id ] ]) !!}

      <input type="hidden" name="is_active" value="1">

      {!! Form::submit('Delete Comment' , ['class' => 'btn btn-danger']) !!}

      {!! Form::close() !!}

      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endif

@endsection