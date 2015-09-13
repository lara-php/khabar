@extends('layouts.master')

@stop

@section('content')
<div class="category-news">
	<div class="news">
		<div class="title">تکنولوژی</div>

		@foreach(Category::find(4)->articles()->orderBy('date','desc')->limit(2)->get() as $article)

		<div class="category-image">
			<img src="{{{ asset('images/khabar/technology/'.$article->image) }}}" />
		</div>
		<div class="text">
			<h4><a href="{{{ route('article',$article->id) }}}">{{{ $article->title }}}</a></h4>
			<div class="subtitle">{{{ $article->subtitle }}}</div>
		</div>

		@endforeach

	</div>

	<div class="news">
		<div class="title">جهان</div>

		@foreach(Category::find(3)->articles()->orderBy('date','desc' )->limit(2)->get() as $article)
		<div class="category-image">
			<img src="{{{ asset('images/khabar/jahan/'.$article->image) }}}" />
		</div>
		<div class="text">
			<h4><a href="{{{ route('article',$article->id) }}}">{{{ $article->title }}}</a></h4>
			<div class="subtitle">{{{ $article->subtitle }}}</div>
		</div>

		@endforeach
	</div>
	<div class="news">
		<div class="title">فرهنگی</div>
		@foreach(Category::find(5)->articles()->orderBy('date','desc')->limit(2)->get() as $article)
		<div class="category-image">
			<img src="{{{ asset('images/khabar/farhangi/'.$article->image) }}}" />
		</div>
		<div class="text">
			<h4><a href="{{{ route('article',$article->id) }}}">{{{ $article->title }}}</a></h4>
			<div class="subtitle">{{{ $article->subtitle }}}</div>
		</div>
		@endforeach
	</div>
	<div class="news">
		<div class="title">ورزشی</div>
		@foreach(Category::find(6)->articles()->orderBy('date','desc')->limit(2)->get() as $article)
		<div class="category-image">
			<img src="{{{ asset('images/khabar/varzeshi/'.$article->image) }}}" />
		</div>
		<div class="text">
			<h4><a href="{{{ route('article',$article->id) }}}">{{{ $article->title }}}</a></h4>
			<div class="subtitle">{{{ $article->subtitle }}}</div>
		</div>
		@endforeach
	</div>
	<div class="clearfix"></div>
	</div>
@stop