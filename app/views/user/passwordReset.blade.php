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
	.table td, .table tr{
		padding: 15px;
		
		border




	}

</style>

@section('content')



{{Form::open(['route'=> 'RemindersController'])}}
<div class="border">
		<div id="sabt">
			پاک کردن پسورد
		</div>
		<div id="info">
			اطلاعات لازم
		</div>
    <input type="hidden" name="token" >
    <div class="table">
    <table>
    <tr>
    	<td>{{ Form::label('email' , 'ایمیل خود را وارد کنید:') }}</td>
    	<td>{{ Form::email('email') }}</td>
    </tr>
    <tr>
    	<td>{{ Form::label('password' , 'کلمه عبور خود را وارد کنید:') }}</td>
    	<td>{{ Form::password('password') }}</td>
    </tr>
    <tr>
    	<td>{{ Form::label('password_confirmation' , 'کلمه عبور خود را دوباره وارد کنید:') }}</td>
    	<td>{{ Form::password('password_confirmation') }}</td>
    </tr>
    <tr>
    	<td colspan="2">{{ Form::submit('Reset Password') }} </td>
    	
    </tr>

    
  </table> 
  </div>
  </div>
{{Form::close()}}

@stop