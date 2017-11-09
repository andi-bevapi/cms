@extends('layouts.admin')

@section('content')


<h3>Here you can edit the post</h3>

<div class="col-md-12">
	<img height="150" src="http://localhost/cms/public/images/{{$posts->photo->photo_path}}">
</div>

<div class="col-md-12">
{!! Form::model( $posts , ['method' => 'PATCH' , 'action'=> ['AdminPostController@update' ,$posts->id] , 'files'=>true]) !!}

	<div class="form-group">
	{!!Form::label('photo' ,'Photo :') !!}
	{!!Form::file('photo_id' , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::label('category_id' ,'Category :') !!}
	{!!Form::select('category_id', ['' => 'Choose Category'] + $category  ,null , ['class'=>'form-control']) !!}
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
	{!!Form::submit('Edit Post' , ['class'=>'btn btn-primary']) !!}
	</div>
	
{!! Form::close() !!}
</div>

<div class="col-md-12">

{!! Form::open( ['method' => 'DELETE' , 'action' => ['AdminPostController@destroy' , $posts->id]]) !!}

	<div class="form-group">
	{!!Form::submit('Delete User' , ['class'=>'btn btn-danger']) !!}
	</div>

{!! Form::close() !!}

</div>

<div class="col-md-12">
	@include('layouts.errors')
</div>

@endsection