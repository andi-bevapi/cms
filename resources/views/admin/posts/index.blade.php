@extends('layouts.admin')

@section('content')

<h3>Here you can create a new post</h3>

@if(Session::has('create_post'))

<p class="bg-danger">{{session('create_post') }}</p>

@endif

@if($posts)

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Owner</th>
        <th>Photo</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>View Post</th>
        <th>View Comment</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->user->name}}</td>
      <td><img height="50" src="http://localhost/cms/public/images/{{$post->photo->photo_path}}"></td>
      <td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
      <td> <a href="{{route('posts.edit' , $post->id)}}">{{$post->title}}</a> </td>
      <td>{{ str_limit($post->body , 18) }}</td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
     <td> <a href="{{ route( 'home.post' , $post->slug) }}">View Post</a> </td> 
      <td> <a href="{{ route('comment.show' , $post->id) }}">View Comment</a> </td> 
      </tr>
    @endforeach
    </tbody>
  </table>
<div class="row">
  <div class="col-md-6 col-sm-offset-5">
    {{ $posts->render() }}
  </div>
</div>
@endif

@endsection