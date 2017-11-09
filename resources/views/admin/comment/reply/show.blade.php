@extends('layouts.admin')

@section('content')

@if($replies)
<table class="table">
    <thead>
      <tr>
    <th>Id</th>
    <th>Author</th>
    <th>Photo</th>
    <th>Email</th>
    <th>Body</th>
    <th>View Comment</th>
    <th>Approve</th>
    <th>Delete Comment</th>
    </tr>
    </thead>

    <tbody>
    @foreach($replies as $reply)

    <tr>
      <td>{{$reply->id}}</td>
      <td>{{$reply->author}}</td>
      <td><img height="50x" src="http://localhost/cms/public/images/{{$reply->photo}}"></td>
      <td>{{$reply->email}}</td>
      <td>{{ str_limit($reply->body, 10) }}</td>
      <td> <a href="{{ route('home.post' , $reply->comment->id ) }}">View Comment</a> </td>
      <td>

      @if($reply->is_active == 0)

      {!! Form::open([ 'method' => 'PATCH' , 'action' => ['AdminCommentReplyController@update' , $reply->id ] ]) !!}

      <input type="hidden" name="is_active" value="1">

      {!! Form::submit('Approve' , ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
      
      @else($comment->is_active == 1)

      {!! Form::open([ 'method' => 'PATCH' , 'action' => ['AdminCommentReplyController@update' , $reply->id ] ]) !!}

      <input type="hidden" name="is_active" value="0">

      {!! Form::submit('Un approve' , ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}

      @endif
      </td>
      <td>

      {!! Form::open([ 'method' => 'DELETE' , 'action' => ['AdminCommentReplyController@destroy' , $reply->id ] ]) !!}

      <input type="hidden" name="is_active" value="1">

      {!! Form::submit('Delete Reply' , ['class' => 'btn btn-danger']) !!}

      {!! Form::close() !!}

      </td>
    </tr>

    @endforeach
    </tbody>
  </table>
@endif

@endsection