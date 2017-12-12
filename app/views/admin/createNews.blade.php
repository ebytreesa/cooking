@extends('layouts.dashboard')

@section('title')
	Oprette nyhed
@stop

@section('content')
	{{ Form::open(array('route' => 'postAddNews'))}} 

	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
	{{ Form::label('title') }}
	{{ Form::text('title','', array('class' => 'form-control')) }}

	@if ($errors->has('title'))
			<strong>
				{{ $errors->first('title') }}
			</strong>
		@endif
	</div>
		<br>
	

	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', '', array('class' => 'form-control')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>

	
	
	{{ Form::submit('Opret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}


@stop