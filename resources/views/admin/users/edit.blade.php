@extends('layouts.admin')

@section('content')

<h2>This is the page of control panel for user</h2>

<div class="col-md-12">
{!! Form::model( $users, ['method' => 'PATCH' , 'action' => ['AdminUserController@update' , $users->id] , 'files'=>true ]) !!}
	<div class="form-group">
	{!!Form::label('name' ,'Name :') !!}
	{!!Form::text('name' , null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('email' ,'Email :') !!}
	{!!Form::email('email' , null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('password' ,'Password :') !!}
	{!!Form::password('password' , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('photo' ,'Photo :') !!}
	{!!Form::file('photo_id' , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('is_active' ,'Status :') !!}
	{!!Form::select('is_active', array(0 => 'Not Active' ,1 => 'Active')  ,null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('role_id' ,'Status :') !!}
	{!!Form::select('role_id', ['' => 'Choose Role'] +$roles  ,null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::submit('Edit User' , ['class'=>'btn btn-primary']) !!}
	</div>
	
{!! Form::close() !!}
</div>

<div class="col-md-12">
{!! Form::open( ['method' => 'DELETE' , 'action' => ['AdminUserController@destroy' , $users->id]]) !!}

	<div class="form-group">
	{!!Form::submit('Delete User' , ['class'=>'btn btn-danger']) !!}
	</div>

{!! Form::close() !!}
</div>

@endsection