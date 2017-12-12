@extends('layouts.home')

@section('title')
Edit User
@stop

@section('content')
{{ Form::open(array('route' => 'postEditUser','files' => true)) }}
	{{-- {{ Form::hidden(Auth::user()->id) }} --}}

	<div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
		{{ Form::label('Username') }}
		{{ Form::text('username', $user->username , array('class' => 'form-control')) }}
		@if ($errors->has('username'))
			<strong>
				{{ $errors->first('username') }}
			</strong>
		@endif
		</div>
		<br>
		

		
	<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
		{{ Form::label('Email') }}
		{{ Form::email('email',$user->email, array('class' => 'form-control')) }}
		@if ($errors->has('email'))
			<strong>
				{{ $errors->first('email') }}
			</strong>
		@endif
		</div>
		<br>

		{{-- <div class="form-group {{ ($errors->has('pass1')) ? 'has-error' : '' }}">
		{{ Form::label('Password') }}
		{{ Form::password('pass1',  array('class' => 'form-control')) }}
		@if ($errors->has('pass1'))
			<strong>
				{{ $errors->first('pass1') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('pass2')) ? 'has-error' : '' }}">
		{{ Form::label('Password igen') }}
		{{ Form::password('pass2',  array('class' => 'form-control')) }}
		@if ($errors->has('pass2'))
			<strong>
				{{ $errors->first('pass2') }}
			</strong>
		@endif
		</div> --}}
		<br>

		{{ Form::label('billede')}}
		{{ Form::file('pic')}}
		<br>
		{{ Form::submit('edit bruger', array('class' => 'btn btn-primary')) }}
{{ Form::close()}}

	
</div>

@stop