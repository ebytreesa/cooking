@extends('layouts.dashboard')

@section('title')
admin
@stop

@section('content')

<div class="row">
	<div class="col-md-3" style="border: 1px solid green;">
		<?php
			$users = User::count();
		?>
		<h3>{{ $users }} users</h3>
	</div>

	<div class="col-md-3" style="border: 1px solid green;">
		<?php
			$recipes = Recipe::count();
		?>
		<h3>{{ $recipes }} recipes</h3>
		
	</div>

	<div class="col-md-3" style="border: 1px solid green;">

		<?php
			$pages = Page::count();
		?>
		<h3>{{ $pages }} pages</h3>
		
	</div>

	<div class="col-md-3" style="border: 1px solid green;">
		<?php
			$cat = Category::count();
		?>
		<h3>{{ $cat }} categories</h3>
		
	</div>
</div>

@stop