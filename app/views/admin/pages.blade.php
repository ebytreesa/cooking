@extends('layouts.dashboard')

@section('title')
admin/pages
@stop

@section('content')
<h2>Pages</h2>

<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			<th>#</th>
      			<th>Title</th> 
      			<th>Edit</th>     			            
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($pages as $page)
    		<tr>
    			<td>#</td>
     			<td> <a href="{{ URL::to('/admin/viewPage/'.$page->title) }}" >{{ $page->title }}</td></a>     				
     			<td><a href="{{ URL::to('/admin/editPage/'.$page->id) }}" class="btn btn-danger btn-xs">edit</a></td>       
      			<td><a href="{{ URL::to('/admin/deletePage/'.$page->id) }}" class="btn btn-danger btn-xs">delete</a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

<a class="btn btn-primary" href="{{ URL::to('/admin/addPage') }}">add ny</a>


@stop