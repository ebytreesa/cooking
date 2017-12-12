@extends('layouts.dashboard')

@section('title')
Oprett page
@stop

@section('content')
<div class="container" >

<h3>Oprett page</h3>

{{ Form::open(array('route' => 'postAddPage' )) }}
	
	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Title') }} 
		{{ Form::text('title', '') }}

		@if ($errors->has('title'))
			<strong>
			{{ $errors->first('title') }}
			</strong>
		@endif
		<br>
 	</div>

 	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Description') }} 
		{{ Form::textarea('description', '', array('class' => 'form-control', 'required' => 'required')) }}

		@if ($errors->has('description'))
			<strong>
			{{ $errors->first('description') }}
			</strong>
		@endif
		<br>
	</div>	

	{{ Form::submit('post', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}


@stop