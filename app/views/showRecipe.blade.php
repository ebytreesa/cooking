@extends('layouts.home')

@section('title')
showrecipe
@stop

@section('content')
<div class="row" style="margin-top:10px;">
	<div class="col-md-6">
		<?php
			$user = User::where('id', $recipe->user_id)->first();
		?>
		Af: <span>{{ $user->username }}</span>
		<p>Votes: {{ $recipe->votes }}</p>
		<h3>{{ $recipe->name }}</h3>
	</div>
	<div class="col-md-6">
	<?php
		if(Auth::check() && Auth::user()->id != $recipe->user_id) { ?>
	
		<a href="{{ URL::to('/recipe/addToFavourites/'.$recipe->id) }}" class="btn btn-default">add to favourites</a>
		<a href="{{ URL::to('/recipe/voteRecipe/'.$recipe->id) }}" class="btn btn-default">vote Recipe</a>
		<a href="{{ URL::to('/recipe/voteUser/'.$user->id) }}" class="btn btn-default">vote chef</a>

	<?php
	 } 
	?>
	</div>

</div>

<div class="row">
	<div class="col-md-8">
	
	<?php
		$ingredient_id = RecipeIngredient::where('recipe_id', $recipe->id)->lists('ingredient_id');

	?>	
	@foreach($ingredient_id as $id)
		<?php
			$ingredient = Ingredient::where('id', $id)->first();
			$amount = RecipeIngredient::where('ingredient_id', $ingredient->id)->first()->amount;
		?>
		 <p>{{ $ingredient->name }} - {{ $amount }}</p>
	@endforeach

	</div>
	<div class="col-md-4">
		<img src="{{ URL::to('/recipes/'.$recipe->image) }}" class="image-responsive" style="height:120px; width:120px">
	</div>	
		
</div>

<div class="row">
	<div class="col-md-12">
		<h4>Method</h4>
		<p>{{nl2br($recipe->description) }}</p>
		
	</div>

	
</div>



@stop