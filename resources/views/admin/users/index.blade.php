@extends('layouts.admin')

@section('content')

<h2>This is the page of control panel for user</h2>

@if(Session::has('user_create'))

<p class="bg-danger"> {{ session('user_create') }} </p>

@else(Session::has('user_delete'))

<p class="bg-danger"> {{ session('user_delete') }} </p>

@endif

@if($users)

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Role</th>
        <th>Photo</th>
        <th>Status</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td> {{$user->id}} </td>
        <td> {{$user->role->name}} </td>
        <td> <img height="50" src="http://localhost/cms/public/images/{{$user->photo ? $user->photo->photo_path : 'No photo'}} "> </td>
        <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td> <a href="{{route('users.edit' , $user->id)}}"> {{$user->name}} </a> </td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>


@endif

@endsection