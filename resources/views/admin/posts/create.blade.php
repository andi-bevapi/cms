@extends('layouts.admin')



@section('content')

@include('includes.tinyeditor')

<h3>Here you can create a new post</h3>


<div class="col-md-12">
{!! Form::open(['method' => 'POST' , 'action'=>'AdminPostController@store' , 'files'=>true]) !!}

	<div class="form-group">
	{!!Form::label('photo' ,'Photo :') !!}
	{!!Form::file('photo_id' , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('category_id' ,'Category :') !!}
	{!!Form::select('category_id', ['' => 'Choose Category'] +$category  ,null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('title' ,'Title :') !!}
	{!!Form::text('title' , null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('body' ,'Body :') !!}
	{!!Form::textarea('body' , null , ['class'=>'form-control' , 'rows' => 4]) !!}
	</div>

	<div class="form-group">
	{!!Form::submit('Create Post' , ['class'=>'btn btn-primary']) !!}
	</div>
	
{!! Form::close() !!}
</div>

<div class="col-md-12">
	@include('layouts.errors')
</div>
	
@endsection
