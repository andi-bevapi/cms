@extends('layouts.admin')

@section('styles')

<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" ></style>

@endsection

@section('content')

<h3>Here you can Upload Media File</h3>


{!!Form::open(['method'=>'POST' ,'action' => 'AdminMediaController@store' , 'class' =>'dropzone' ,'id' => 'my-awesome-dropzone']) !!}



{!! Form::close() !!}

@endsection



@section('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js" ></script>

@endsection