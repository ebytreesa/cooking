@extends('layouts.dashboard')

@section('title')
	nyheder
@stop

@section('content')

{{-- <h4 class="" style="color:red; font-weight:900; font-style:italic;">NYHEDER</h4><br>
<hr style="border-color: grey;">
<a href="/admin/addNews" class="btn btn-primary">opret nyhed</a>
<hr>
 @foreach($news as $news)
 
 <h3>{{ $news->title }}</h3>
 {{ $news->created_at }}
 <p>{{ nl2br($news->description) }}</p>
<a href="/admin/editNews/{{ $news->id  }}" class="btn btn-primary btn-xs">RET</a>
<a href="/admin/deleteNews/{{ $news->id  }}" class="btn btn-danger btn-xs">SLET</a>
<hr>
 @endforeach --}}

 <table class="table table-responsive table-striped" style="border: 1px solid gray;">
  		<thead class="thead-inverse" style="background-color: black; color: white;">
    		<tr >
     			<th>#</th>
      			<th>Title</th>
      			<th>Description</th>
              	<th>Edit</th>
      			<th>Slet</th>
      		</tr>
 		 </thead>
  		<tbody>
  		@foreach($news as $news)
    		<tr>
    			<td>#</td>
     			<td> {{ $news->title }}</td>     				
     			<td>{{ $news->description}}</td>
          <td><a href="{{ URL::to('/admin/editNews/'.$news->id)  }}" class="btn btn-primary btn-xs">Edit</a></td>
      			<td><a href="{{ URL::to('/admin/deleteNews/'.$news->id)  }}" class="btn btn-danger btn-xs">delete</a></td>
      			
   		    </tr>
   		@endforeach
   		</tbody>
    </table>
 
<a href="{{ URL::to('/admin/addNews') }}" class="btn btn-primary">Add News</a>

@stop