<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

<script src="{{ URL::to('/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
 
</head>
<style>
.icon-bar{
	background-color: black;
}

</style>	


<body>
<h1><center>ADMIN PANEL</center></h1>
	<div class="container-fluid" style="background-color:;">
		<div>
		
		<div class="" style="padding:10px ;margin-bottom: 20px; ">
			@if (Auth::check() && Auth::user()->admin == 1)
				 welcome <strong style="color:red;">{{ Auth::user()->username }}</strong><br>
				 
			@endif
		</div>
		<div class="container-fluid">
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
							<li ><a href="{{ URL::to('/admin') }}">Dashboard</a></li>							
							<li ><a href="{{ URL::to('/admin/pages') }}">Pages</a></li>
							<li ><a href="{{ URL::to('/admin/users') }}">Users</a></li>
							<li ><a href="{{ URL::to('/admin/listCat') }}">Categories</a></li>
							<li ><a href="{{ URL::to('/admin/listNews') }}">News</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">						 
							@if (Auth::check() && Auth::user()->admin == 1)
								<li ><a href="{{ URL::to('/logout') }}">Logout</a></li>				 
							@endif
							
						</ul>																		
					</div>
				</div>
			</nav>
		</div>	
	</div>
	</div>
		
	<div class="container" style="margin-top:20px;">
		<div class="col-md-12" style="">
			@yield('content')
		</div>

		{{-- <div class="col-md-4" style="border:1px solid black;">
			@yield('content')
		</div> --}}
			
	</div>

		
		
	

</body>
</html>