@extends('layouts.admin')

@section('content')

<h2>Here You Can create new User</h2>


<div class="col-md-12">
{!! Form::open(['method' => 'POST' , 'action'=>'AdminUserController@store' , 'files'=>true]) !!}

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
	{!!Form::submit('Create User' , ['class'=>'btn btn-primary']) !!}
	</div>
	
{!! Form::close() !!}
</div>

<div class="col-md-12">
	@include('layouts.errors')
</div>
@endsection