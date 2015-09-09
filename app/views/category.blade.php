@extends('layouts.master')

@stop

@section('content')
	

	{{{ $category->name }}}
	
<ul>
	@foreach($articles as $article)
		<li><a href="{{{ route('article', $article->id) }}}">{{{ $article->title  }}}</a></li>	
	@endforeach
</ul>
	{{ $articles->links() }}
@stop