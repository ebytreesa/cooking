@extends('layouts.home')

@section('title')
{{ $page->title }}
@stop

@section('content')
<h3>{{ $page->title }}</h3>
<p>{{ nl2br($page->description) }}</p>

@stop