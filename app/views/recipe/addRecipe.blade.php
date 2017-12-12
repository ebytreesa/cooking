@extends('layouts.home')

@section('title')
addRecipe
@stop

@section('content')
<h3>Add a Recipe</h3>
<div class="">
	{{ Form::open(array('route' => 'postAddRecipe','files' => true )) }}
	
	<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Title') }} 
		{{ Form::text('title', '', array('class' => 'form-control')) }}

		@if ($errors->has('title'))
			<strong>
			{{ $errors->first('title') }}
			</strong>
		@endif
		<br>
 	</div>

 	{{ Form::label('billede')}}
	{{ Form::file('pic')}}
	<br>

	<div class="form-group">
	{{ Form::label('Category') }}
	<select name="category">		
			<?php
			$cat =Category::orderBy('name','asc')->get();
			?>
			<option selected disabled>Please select one option</option>
			@foreach($cat as $cat)
			<option value="{{ $cat->id }}" data="{{ $cat->id }}">{{ $cat->name }}</option>
			@endforeach
		
	</select>
	@if ($errors->has('category'))
		<strong>
		{{ $errors->first('category') }}
		</strong>
	@endif
	</div>
	
 	<div class="form-group">
 		
 		<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse">
    		<tr >
     		
      			<th>Ingredient</th>
      			<th>amount</th>
      			<th>Slet</th>
      			
      		</tr>
 		 </thead>
  		<tbody>
  			<tr class="">
		 		<td><input type="text" name="ing[]"></td><br> 
		 		<td><input type="text" name="amount[]"></td><br>
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>				
			</tr>
			<tr>
		 		<td><input type="text" name="ing[]"></td><br> 
		 		<td><input type="text" name="amount[]"></td><br>
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>				
			</tr>
			<tr>
		 		<td><input type="text" name="ing[]"></td><br> 
		 		<td><input type="text" name="amount[]"></td><br>
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>				
			</tr>
			<tr>
		 		<td><input type="text" name="ing[]"></td><br> 
		 		<td><input type="text" name="amount[]"></td><br>
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>				
			</tr>
			<tr>
		 		<td><input type="text" name="ing[]"></td><br> 
		 		<td><input type="text" name="amount[]"></td><br>
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>				
			</tr>

		</tbody>
 		</table>
 		
	</div>
<a href="" class=" btn btn-primary add">Add more</a>

	<div class="form-group {{ ($errors->has('method')) ? 'has-error' : '' }}"><br>
		{{ Form::label('Method') }} 
		{{ Form::textarea('method', '', array('class' => 'form-control')) }}

		@if ($errors->has('method'))
			<strong>
			{{ $errors->first('method') }}
			</strong>
		@endif
		<br>
	</div>	
	

{{ Form::submit('post', array('class' => 'btn btn-primary')) }}
		

{{ Form::close() }}	
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$(".add").click(function(e){
			e.preventDefault();
			$("tbody").append(
				'<tr>\
				<td><input type="text" name="ing[]"></td><br>\
				<td><input type="text" name="amount[]"></td><br>\
		 		<td><a href="" class="btn btn-danger btn-xs remove"><i class="glyphicon glyphicon-danger">x</i></a></td>\
				</tr>'
				);
			
		});

		$(document).on('click','.remove',function(e){
			
			$(this).parent().parent().remove();
			e.preventDefault();

			
		});
});
	

</script>

@stop