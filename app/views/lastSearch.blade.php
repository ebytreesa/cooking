@extends('layouts.home')

@section('title')
sidste søgninger
@stop

@section('content')
<h3>Sidste søgninger</h3>
	@foreach($search as $search)
		<?php
			$recipes = DB::table('recipes')
				->join('users', 'users.id', '=','recipes.user_id' )
				->select('users.username as username', 'recipes.*')
				->where('username', 'like', '%'.$search->search.'%')
				->orWhere('name', 'like', '%'.$search->search.'%')
				->orWhere('description', 'like', '%'.$search->search.'%')
				->paginate(10);

		?>

		@foreach($recipes as $recipe)
	<div class="row" style="border:1px solid black; margin-bottom:10px;">

	<?php

		 $cat = Category::where('id', $recipe->cat_id)->first(); 
	?>
	
						
		<div class="col-md-3 recipe_image">
		<img src="{{ URL::to('/recipes/'.$recipe->image) }}" class="image-responsive" style="height:120px; width:120px">
				
		</div>
		<div class="col-md-9 ">
			<h4><a href="{{ URL::to('/recipe/'.$recipe->id) }}">{{ $recipe->name }}</a></h4>
			<p><strong>Category</strong>:{{ $cat->name }}</p>
			<p>af:<strong>{{ $recipe->username}}</strong></p>
			<p><strong>Votes</strong>:{{ $recipe->votes }}	</p>
		</div>
			
	</div>
	@endforeach
	@endforeach


@stop