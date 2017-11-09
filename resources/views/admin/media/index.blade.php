@extends('layouts.admin')

@section('content')


<h3>Here you can View upload Media</h3>

<div class="col-md-12">

@if($photos)
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Created At</th>
        <th>Delete Image</th>
      </tr>
    </thead>
    <tbody>
    @foreach($photos as $photo)
      <tr>
      <td>{{$photo->id}}</td>
      <td><img height="50" src="http://localhost/cms/public/images/{{$photo->photo_path ? $photo->photo_path : 'No foto' }}"></td>
      <td>{{$photo->created_at->diffForHumans()}}</td>
      <td>
{!! Form::open( ['method' => 'DELETE' , 'action' => ['AdminMediaController@destroy' , $photo->id]]) !!}

  <div class="form-group">
  {!!Form::submit('Delete Photo' , ['class'=>'btn btn-danger']) !!}
  </div>

{!! Form::close() !!}
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endif

</div>



@endsection