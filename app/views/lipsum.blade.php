@extends('layout')

@section('content')
<h1>Lorem ipsum generator</h1>

{{ Form::open(array('action' => 'LipsumController@create', 'method' => 'get')) }}
	{{ Form::label('num_paragraphs', 'Number of paragraphs') }}
	{{ Form::number('num_paragraphs', $num_paragraphs) }}

	{{ Form::label('paragraph_length', 'Length of paragraphs') }}
	{{ Form::select('paragraph_length', array('short' => 'Short', 'medium' => 'Medium', 'long' => 'Long'), $paragraph_length) }}

	{{ Form::submit('Generate text') }}
{{ Form::close() }}

@foreach($paragraphs as $paragraph)
	<p>{{ $paragraph }}</p>
@endforeach
@stop
