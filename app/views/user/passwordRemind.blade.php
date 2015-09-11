@extends('layouts.master')

@stop
@section('tab')

@stop


@section('slide')

@stop
<style>

.border{
		border:1px solid #6B91AB;
		border-radius:3px ;
		width: 100%;
		margin-top: 20px;
	}
	#sabt{
		
		background-color: #7998AD;
		color:#fff;
		font-size: 18px;
		padding: 10px
	}
	#info{
		background-color: #E9E9E9;
		font-size: 20px;
		padding: 10px

	}
	.form{
		
		padding-right: 10px;
		padding-top: 20px
	}
	
</style>
@section('content')
<div class="border">
		<div id="sabt">
			بازگردانی رمز
		</div>
		<div id="info">
			اطلاعات لازم
		</div>
<div class="form">

	
{{Form::open(['route'=> 'RemindersController'])}}


	{{ Form::label('email', 'ایمیل خود را وارد کنید:') }}
    {{ form::email('email') }}
     {{ Form::submit('send') }} 
{{Form::close()}}
</div>
</div>
@stop