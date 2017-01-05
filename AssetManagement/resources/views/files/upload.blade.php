@extends('layouts.app')

@section('content')
<h1>upload files </h1>

{{ Form::open(array('url'=>'/handleUpload','files'=>true)) }}
  
  {{ Form::file('file') }}
  {{ Form::token() }}
  {{ Form::submit('Upload') }}

{{ Form::close() }}


@endsection