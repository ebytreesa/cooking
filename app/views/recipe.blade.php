@extends('layouts.home')

@section('title')
opskrifter
@stop

@section('content')
	<h3>Opsrifter</h3>
	@foreach($recipes as $recipe)
	<div class="row" style="border:1px solid black;margin-bottom:10px;">

	<?php

		 $cat = Category::where('id', $recipe->cat_id)->first(); 
	?>
	
						
		<div class="col-md-3 recipe_image">
		<img src="{{ URL::to('/recipes/'.$recipe->image) }} " class="image-responsive"  style="height:120px; width:120px">
				
		</div>
		<div class="col-md-9 ">
			<h4><a href="{{ URL::to('/recipe/'.$recipe->id) }}">{{ $recipe->name }}</a></h4>
			<?php
			 $user = User::where('id', $recipe->user_id)->first()->username;
			?>
			<p>af:<strong>{{ $user }}</strong>:</p>
			<p><strong>Category</strong>:{{ $cat->name }}</p>
			<p><strong>Votes</strong>:{{ $recipe->votes }}	</p>
		</div>
			
	</div>
	@endforeach

	<center>{{ $recipes->links() }}</center>		



@stop