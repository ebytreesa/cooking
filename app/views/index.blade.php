@extends('layouts.home')

@section('title')
home
@stop

@section('content')
<h3>top 5 kokke</h3>
<div class="row" style="margin-bottom: 30px; ">
	<?php
			$users = User::Orderby('votes', 'desc')->take(5)->get();
		?>
		@foreach($users as $user)
	<div class="col-md-2" style="border: 1px solid green; ">
		
		<img src="{{ URL::to('/users/'.$user->image) }}" class="image-responsive" style="height:120px; width:120px">
		<p>{{ $user->username }}</p>
	</div>
	@endforeach
</div>

<h3>top 5 recipes</h3>
<div class="row" style="margin-bottom: 30px; ">
	<?php
			$recipes = Recipe::Orderby('votes', 'desc')->take(5)->get();
		?>
		@foreach($recipes as $recipe)
	<div class="col-md-2" style="border: 1px solid green; ">
		
		<img src="{{ URL::to('/recipes/'.$recipe->image) }} " class="image-responsive"  style="height:120px; width:120px">
		<p>{{ $recipe->name }}</p>
	</div>
	@endforeach
</div>

<h3>News</h3>
<div class="row" style="margin-bottom: 30px; ">
	<?php
			$news = News::Orderby('created_at', 'desc')->take(5)->get();
		?>
		@foreach($news as $news)
	<div class="col-md-2" style="border: 1px solid green;">
		
		<h3>{{ $news->title }} </h3>
	</div>
	@endforeach
</div>

@stop