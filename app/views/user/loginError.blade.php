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
	.info{
		
		font-size: 14px;
		padding: 10px;
		border-bottom: 1px solid #CEDFEB;

	}
	#info{
		background-color: #E9E9E9;
		font-size: 20px;
		padding: 10px

	}
	table td, table tr{
		padding: 15px;
		
		




	}


</style>
@section('content')

@if(Session::get('loginError') == true)
	<div class="border">
		<div id="sabt">
			پیام سیستم
		</div>
		<div class="info" >
			نام کاربری یا کلمه عبور وارد شده نادرست است.به بزرگ و کوچک بودن حروف توجه فرمایید . اگر کلمه‌ی عبورتان را از یاد برده‌اید<a href="{{ route('password.remind') }}"> اینجا</a> را کلیک کنید 
		</div>
		<div class="info">
			برای استفاده از صفحه می بایست ابتدا <a href="{{ route('user.add') }}"> ثبت نام </a>  کنید.
		</div>
		<div id="info">ورود</div>
		<div class="login" id="login">
			
				{{ Form::open(['route'=>'login']) }}
				<table >
					<tr>
						<td >
							{{ Form::label('username', 'نام کاربری:') }}
						</td>
						<td >
							{{ Form::text('username','',['placeholder'=>'نام کاربری']) }}
						</td>
					</tr>
					<tr>
						<td>
							{{ Form::label('password', 'کلمه عبور:') }}
						</td>
						<td>
							{{ Form::password('password',['placeholder'=>'رمز عبور']) }}
						</td>
					</tr>
					<tr>
						
						<td colspan="2">
							{{ Form::checkbox('remember') }} مرا به خاطر داشته باش
						</td>
					</tr>
					<tr>
						<td colspan="2">
							
					{{ Form::submit('ورود') }}
					{{ Form::reset('خالی کردن فیلدها') }}
						</td>
						
					</tr>
				
					
					
					
				</table>	
				{{ Form::close() }}
			</div>

	</div>
@endif

@stop