@extends('layouts.dashboard')

@section('title')
edit page
@stop

@section('content')
<div class="container" >

<h3>Edit page</h3>

{{ Form::open(array('route' => 'postEditPage' )) }}
	{{ Form::hidden('id', $page->id) }}
	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Title') }} 
		{{ Form::text('title', $page->title) }}

		@if ($errors->has('title'))
			<strong>
			{{ $errors->first('title') }}
			</strong>
		@endif
		<br>
 	</div>

 	<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Description') }} 
		{{ Form::textarea('description', $page->description, array('class' => 'form-control', 'required' => 'required')) }}

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