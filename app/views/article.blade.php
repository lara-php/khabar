@extends('layouts.master')

@stop
@section('tab')

@stop
<style>
	.news{
		padding-right: 20px
	}
	.date{
		font-size: 16px
	}
</style>
@section('content')
	
<div class="news">

	<div class="date">{{ $article->date }}</div>
	
		<img src="{{{asset('images/khabar/technology/'  .$article->image )}}}" />
	
	<h4>{{{ $article->title }}}</h4>

	<div>{{{ $article->text }}}</div>
</div>
<ul>
	@foreach($article->categories as $category)
		<li><a href="{{{ route('category', $category->id) }}}">{{{ $category->name  }}}</a></li>	
	@endforeach
</ul>

@stop