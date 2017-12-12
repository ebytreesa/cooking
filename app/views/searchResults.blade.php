@extends('layouts.home')

@section('title')
searchResults
@stop

@section('content')

<h3>Opsrifter</h3>

<p>Søgeresult af  '{{ $search }}'</p>
	@foreach($recipes as $recipe)
	<div class="row" style="border:1px solid black; margin-bottom:10px;">

	<?php

		 $cat = Category::where('id', $recipe->cat_id)->first(); 
	?>
	
						
		<div class="col-md-3 recipe_image">
		<img src="/recipes/{{ $recipe->image }}_thumb" class="image-responsive">
				
		</div>
		<div class="col-md-9 ">
			<h4><a href="/recipe/{{ $recipe->id }}">{{ $recipe->name }}</a></h4>
			<p><strong>Category</strong>:{{ $cat->name }}</p>
			<p>af:<strong>{{ $recipe->username}}</strong></p>
			<p><strong>Votes</strong>:{{ $recipe->votes }}	</p>
		</div>
			
	</div>
	@endforeach

	<center>{{ $recipes->links() }}</center>	

@stop