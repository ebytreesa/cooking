@extends('layouts.dashboard')

@section('title')
Users
@stop
@section('content')

<h3>User List</h3>
<table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			<th>#</th>
      			<th>Username</th>
      			<th>Email</th>
              <th>Profle</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($users as $user)
    		<tr>
    			<td>#</td>
     			<td> {{ $user->username }}</td>     				
     			<td>{{ $user->email}}</td>
          <td><a href="{{ URL::to('/admin/userProfile/'.$user->id) }}" class="btn btn-primary btn-xs">View</a></td>
      			<td><a href="{{ URL::to('/admin/deleteUser/'.$user->id) }}" class="btn btn-danger btn-xs">delete</a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>

@stop