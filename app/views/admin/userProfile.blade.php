@extends('layouts.dashboard')

@section('title')
admin/userProfile
@stop

@section('content')

<div class="row user_info" style="border:1px solid black; margin-bottom:30px;padding:25px;">
	<div class="col-md-3">
		<img src="{{ URL::to('/users/'. $user->image.'_thumb') }}" class="image-responsive"  style="height:120px; width:120px">
	</div>
	<div class="col-md-9">
	<p>Username: {{ $user->username }}</p>
	<p>Email: {{ $user->email }}</p>	
	<p>Votes: {{ $user->votes }}</p>
	
	</div>
	{{-- <div class="col-md-6 ">
		
	</div> --}}
</div>
<div class=" row" style="margin-bottom:10px;">
	<h3 style="display:inline;">Opskrifter</h3>
	
	
</div>
	<?php
		$recipes = Recipe::where('user_id', $user->id)->get();
	?>
	@foreach($recipes as $recipe)
	<div class="row user_recipe" style="border:1px solid black; margin-bottom:15px; padding:10px;">	
	<?php
		 $cat = Category::where('id', $recipe->cat_id)->first(); 
	?>						
		<div class="col-md-3 recipe_image">
		<img src="{{ URL::to('/recipes/'.$recipe->image) }}" class="image-responsive"  style="height:120px; width:120px">
				
		</div>
		<div class="col-md-9 ">
			<div class="col-md-9">
				<h4><a href="{{ URL::to('/recipe/'.$recipe->id) }}">{{ $recipe->name }}</a></h4>
				<p><strong>Category</strong>:{{ $cat->name }}</p>	
				<p><strong>Votes</strong>:{{ $recipe->votes }}	</p>
			</div>
			<div class="col-md-3">
				
				<a href="{{ URL::to('/profile/'.$user->id.'/deleteRecipe/'.$recipe->id) }}" class="btn btn-xs btn-danger pull-right" style="">Delete</a>
		
			</div>
		</div>
			
	</div>

@endforeach
	

@stop