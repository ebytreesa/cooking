@extends('layouts.home')

@section('title')
favourite Recipes
@stop

@section('content')
<h3> Favourites</h3>
@foreach($fav as $fav)
<?php
	$recipe = Recipe::where('id', $fav->recipe_id)->first();
?>

	<div class="row" style="border:1px solid black;">

	<?php

		 $cat = Category::where('id', $recipe->cat_id)->first(); 
	?>
	
						
		<div class="col-md-3 recipe_image">
		<img src="{{ URL::to('/recipes/'.$recipe->image) }} " class="image-responsive" style="height:120px; width:120px">
				
		</div>
		<div class="col-md-9 ">
			<h4><a href="{{ URL::to('/recipe/'.$recipe->id) }}">{{ $recipe->name }}</a></h4>
			<strong>Category</strong>:{{ $cat->name }}	
		</div>
			
	</div>
	@endforeach


@stop