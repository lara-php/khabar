@extends('layouts.cms')
@stop

@section('content')

<style type="text/css">
	
.table-toolbar{
	border: 1px solid #ddd;
	border-bottom: 0;
	padding: 10px;
}

.table-toolbar .pagination{
	margin: 0;
	float: left;
}

.table-toolbar select.input-sm{
	height: 29px;
	float: left;
}

.table-toolbar .pipe{
	height: 27px;
	width: 1px;
	background-color: #ddd;
	margin: 1px 8px;
	float: left;
}

.table thead tr th{
	direction: rtl;
	text-align: right;
}

.table thead tr th .form-control{
	display: block;
	width: 100%;
}

.table tbody tr td{
	direction: rtl;
	text-align: right;
}

.table tr:nth-of-type(1) th:nth-last-of-type(1) button:nth-of-type(1){
	width: 48%;
	float: left;
}

.table tr:nth-of-type(1) th:nth-last-of-type(1) a:nth-of-type(1){
	width: 48%;
	float: right;
}

.page-toolbar{
	direction: rtl;
	text-align: right;
	margin: 50px 0 50px 0;
}

/* pagination-sm*/
</style>

<h2 class="pageTitle">فهرست مطالب</h2>

<div class="page-toolbar">
	<a href="" class="btn btn-success">مطلب جدید</a>
</div>
	
@if(Session::has('flashMessage') && Session::get('flashMessage') == 'deleted')
	<div class="alert alert-success">
		<b>مطلب مورد نظر با موفقیت حذف شد!</b>.
	</div>
@endif

<form class="form-inline">
<div class="table-toolbar">

	@if (count($articles) > 0)	
		{{ $articles->appends(Input::except(['page']))->links() }}
		<div class="pipe"></div>
	@endif
	
	<select class="form-control input-sm form-inline">
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="100">100</option>
	</select>
	<div class="clearfix"></div>
	
</div>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>
				<button type="submit" class="btn btn-success btn-sm">فیلتر</button>
				<a href="{{ route('article.list') }}" class="btn btn-warning btn-sm">حذف فیلتر</a>
			</th>
			<th>
				{{ Form::select('publish', ['' => 'همه', '1' => 'منتشر شده', '0' => 'منتشر نشده'], Input::get('publish'), ['class' => 'form-control']) }}
			</th>
			<th><input type="text" class="form-control input-sm" name="date" value="{{ Input::get('date') }}" /></th>	
			<th><input type="text" class="form-control input-sm" name="title"  value="{{ Input::get('title') }}"/></th>
			
			<th></th>
		</tr>
		<tr>
			<th style="width:135px">عملیات</th>
			<th>وضعیت</th>
			<th>تاریخ انتشار</th>
			<th>عنوان</th>
			<th style="width:15px">#</th>
		</tr>
	</thead>

	<tbody>
		<?php $i = $articles->getFrom() ?>
		@foreach ($articles as $article)
		<tr>
			<td>
				<a href="" class="btn btn-info btn-xs">نمایش</a>
				<a href="" class="btn btn-warning btn-xs">ویرایش</a>
				<a href="{{ route('content.delete', $content->id) }}" class="btn btn-danger btn-xs delete">حذف</a>
			</td>
			<td>{{ $article->publish == 1 ? 'منتشر شده' : 'منتشر نشده' }}</td>
			<td>{{ $article->date}}</td>
			<td>{{ $article->title }}</td>
			<td>{{ $i++ }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</form>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">هشدار!</h4>
			</div>
			<div class="modal-body">
				از حذف این رکورد مطمئن هستید؟
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">آخ، نه!</button>
				<a href="" type="button" class="btn btn-danger delete">بله، مطمئنم!</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(function()
{
	$('.table-toolbar .pagination').addClass('pagination-sm');


	$('.table .delete').click(function()
	{
		$('.modal .delete').prop('href',  $(this).prop('href'));

		$('.modal').modal();

		return false;
	});

	
});

</script>

@stop