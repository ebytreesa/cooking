@extends('layouts.dashboard')

@section('title')
	Ret news
@stop

@section('content')
	{{ Form::open(array('route' => 'postEditNews')) }}
	{{ Form::hidden('id', $news->id) }} 

	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
	{{ Form::label('title') }}
	{{ Form::text('title', $news->title, array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('title'))
			<strong>
				{{ $errors->first('title') }}
			</strong>
		@endif
	</div>
		<br>
	

	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
	{{ Form::label('description') }}
	{{ Form::textarea('description', $news->description, array('class' => 'form-control', 'required' => 'required')) }}

	@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
	</div>
		<br>

	
	
	{{ Form::submit('Ret', array('class' => 'btn btn-primary')) }}
	

	 
{{ Form::close() }}



@stop