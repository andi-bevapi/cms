@extends('layouts.admin')

@section('content')


<h3>Here you can edit the post</h3>


<div class="col-md-12">
{!! Form::model( $category , ['method' => 'PATCH' , 'action'=> ['AdminCategoryController@update' ,$category->id] ]) !!}

	<div class="form-group">
	{!!Form::label('name' ,'Name :') !!}
	{!!Form::text('name' , null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
	{!!Form::submit('Edit Category' , ['class'=>'btn btn-primary']) !!}
	</div>
	
{!! Form::close() !!}
</div>

<div class="col-md-12">

{!! Form::open( ['method' => 'DELETE' , 'action' => ['AdminCategoryController@destroy' , $category->id]]) !!}

	<div class="form-group">
	{!!Form::submit('Delete Category' , ['class'=>'btn btn-danger']) !!}
	</div>

{!! Form::close() !!}

</div>

<div class="col-md-12">
	@include('layouts.errors')
</div>

@endsection