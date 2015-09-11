@extends('layouts.master')

@stop
@section('tab')

@stop

@section('slide')

@stop
<style>
	.padding{
		padding-right: 20px
	}
	.border{
		border:1px solid #6B91AB;
		border-radius:3px ;
		width: 100%;

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
	
	.table td, .table tr{
		padding: 15px;
	
	}

	
	.error{
		color: #D83333;
		border: 1px solid red;
		width: 30%;
		margin: 10px;
		padding-right: 10px;
		margin-right: 30px !important;
	}
	.has-error input{
		border-color: red
	}
	.message{
		padding: 20px;
		text-align: center;
		border:1px solid green;
		width: 300px;
		margin: 20px auto;
		font-weight: bold
	}

</style>
@section('content')

@if(Session::get('inserted') == true)
	<div class="message">
		ثبت نام شما با موفقیت انجام شد
	</div>
@endif

	
{{ Form::open(['route' => 'user.register']) }}

			
<div class="padding">
	<h3>ثبت نام</h3>
	<div class="border">
		<div id="sabt">
			ثبت نام در سایت
		</div>
		<div id="info">
			اطلاعات لازم
		</div>

		
		@foreach ($errors->all() as $error)
				
				<div class="error">{{ $error }}</div>
			@endforeach	
		<div class="table">
			<table>
				<tr>
					<td>
						نام کاربری:
					</td>
					<td class="{{ $errors ->has('username') ? 'has-error' : '' }}">
						{{ Form::text('username', Input::old('username') ) }}
					</td>
					<!--<td class="error">
						{{ $errors->first('username') }}
					</td>!-->
				</tr>
				<tr>
					<td>
						کلمه عبور:
					</td>
					<td class="{{ $errors ->has('password') ? 'has-error' : '' }}">
						{{ Form::password('password') }}
					</td>
					<!--<td class="error">
						{{ $errors->first('password') }}
					</td>!-->
				</tr>
				<tr>
					<td>
						کلمه عبور را دوباره وارد کنید:
					</td>
					<td class="{{ $errors ->has('password_confirmation') ? 'has-error' : '' }}">
						{{ Form::password('password_confirmation') }}
					</td>
					<!--<td class="error">
						{{ $errors->first('password_confirmation') }}
					</td>!-->
				</tr>
				<tr>
					<td>
						آدرس ایمیل:
					</td>
					<td class="{{ $errors ->has('email') ? 'has-error' : '' }}">
						{{ Form::text('email',Input::old('username')) }}
					</td>
					<!--<td class="error">
						{{ $errors->first('email') }}
					</td>!-->
				</tr>
				<tr>
					<td>
						آدرس ایمیل را دوباره وارد کنید:
					</td>
					<td class="{{ $errors ->has('email_confirmation') ? 'has-error' : '' }}">
						{{ Form::text('email_confirmation',Input::old('username')) }}
					</td>
					<!--<td class="error">
						{{ $errors->first('email_confirmation') }}
					</td>!-->
				</tr>

				
				<tr>
					<td>
						تصویر انسان یاب
					</td>
					<td>
						{{ Form::text('usernam4444e') }}
					</td>
				</tr>
				<tr>
					<td colspan="3">
						{{ Form::submit('تکمیل ثبت نام') }}
						{{ Form::reset('خالی کردن فیلدها') }}
					</td>
					
				</tr>
			</table>
		</div>
	</div>
</div>
{{ Form::close() }}





@stop