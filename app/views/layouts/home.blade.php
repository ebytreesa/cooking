<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ URL::to('/css/bootstrap.min.css') }}">

 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>

 
</head>
<style>
.icon-bar{
	background-color: black;

}

</style>	


<body>


	<div class="container-fluid"  style="margin-top:20px; margin-bottom:50px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					@if (Auth::check())
						 welcome <strong style="color:red;">{{ Auth::user()->username }}</strong><br>
					@endif
				</div>
				
				<div class="col-md-6 form-inline" >		
					{{ Form::open(array('route' =>'postSearch')) }}		
					<div class="form-group">						
						<input type="text" name="search" class="form-control" style="" >
					</div>
					<input type="submit" name="submit" value="søg" class="btn btn-primary">	
		 			
					{{ Form::close() }}
				</div>	
			</div>		
		</div>
		
		<div class="container">
			@if ( Session::has('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{ Session::get('success') }}
			</div>
			@endif
			@if ( Session::has('error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					{{ Session::get('error') }}
				</div>
			@endif
		</div>
	
		<div class="row" >			
			<nav class="nav  navbar-static-top" >
				<div class="container">
		 			<div class="navbar-header">
      					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" >
        					<span class="sr-only">Toggle navigation</span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
       						<span class="icon-bar"></span>
     					</button>
      					<a class="navbar-brand" href="/">COOKBOOK</a>
   					</div>
    				<div class="collapse navbar-collapse" id="navbar">
						<ul class="nav navbar-nav">						 
							<li ><a href="{{ URL::to('/') }}">Home</a></li>
							<li ><a href="{{ URL::to('/recipe') }}">opskrifter</a></li>
							<?php
								$pages = Page::get();
							?>
							@foreach($pages as $page)
							<li ><a href="{{ URL::to('/home/'.$page->title) }} ">{{ $page->title }}</a></li>
							@endforeach
						</ul>
						<ul class="nav navbar-nav navbar-right">
														 
							@if (Auth::check())
								<li class="dropdown">									
									<a href="" class="dropdown-toggle" data-toggle="dropdown">
										Profile<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="{{ URL::to('/profile/'.Auth::user()->username) }} ">Min side</a></li>
										@if (Auth::user()->admin == 1)
											<li><a href="{{ URL::to('/admin') }}">Admin Panel</a></li>	 			
										@endif
										<li><a href="{{ URL::to('/logout') }}">Logout</a></li>
									</ul>																	
								</li>										 
							@else
								<li ><a href="{{ URL::to('/login') }}">Login</a></li>
								<li ><a href="{{ URL::to('/register') }}">Register</a></li>
							@endif
						</ul>																		
					</div>
				</div>
			</nav>
		</div>	
	</div>
	<!-- </div> -->

	<div class="container" style="margin-top:20px;">
		<div class="col-md-12"  margin-bottom:50px;">
			@yield('content')
		</div>

		
			
	</div>

		
		
	

</body>
</html>