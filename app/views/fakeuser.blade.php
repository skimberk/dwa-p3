@extends('layout')

@section('content')
<h1>Fake user generator</h1>

{{ Form::open(array('action' => 'FakeUserController@create', 'method' => 'get')) }}
	{{ Form::submit('Generate another user') }}
{{ Form::close() }}

<p>{{ $name }}</p>
<p>{{ implode('<br>', explode("\n", $address)) }}</p>
@stop
