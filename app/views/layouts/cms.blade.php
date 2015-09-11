<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
	<title></title>
	<script type="text/javascript" src="{{{ asset('js/tabcontent/tabcontent.js') }}}"></script>
	<link rel="stylesheet" type="text/css" href="{{{ asset('js/tabcontent/template1/tabcontent.css') }}}" />
	<link rel="stylesheet"  href="{{{ asset('css/bootstrap.css') }}}" />
	<link rel="stylesheet"  href="{{{ asset('css/bootstrap.min.css') }}}" />

	<link rel="stylesheet" type="text/css" href="{{{ asset('css/cms.css') }}}" />
	<link rel="stylesheet" href="{{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}}">
<script rel="stylesheet"  type="text/javascript" href="{{{ asset('js/jquery.inputmask.bundle.min.js') }}}" /></script>
	<script rel="stylesheet"  type="text/javascript" href="{{{ asset('js/jquery-1.11.2.min.js') }}}" /></script>
	<script rel="stylesheet"  type="text/javascript" href="{{{ asset('js/angular.min.js') }}}" /></script>
	<script rel="stylesheet"  type="text/javascript" href="{{{ asset('js/bootstrap.min.js') }}}" /></script>
	<script rel="stylesheet"  type="text/javascript" href="{{{ asset('ckeditor/ckeditor.js') }}}" /></script>
	<script rel="stylesheet"  type="text/javascript" href="{{{ asset('js/jquery.inputmask.bundle.min.js') }}}" /></script>

	
	

<style type="text/css">
	
	#content-list{
			padding: 40px 40px 40px 290px;
						direction: rtl;


		}
	/*	#content-list {
			padding: 40px 290px 100px 40px;
		}*/

		#content-list .pageTitle{
			margin: 10px 0 25px 0;
			border-bottom: 1px solid #DDD;
			padding: 0 0 10px 0;
			position: relative;
			direction: rtl;
		}


		#content-list .pageTitle span{
			position: absolute;
			right: 0;
			bottom: -20px;
		}
		

				#head{
			
			background-color: #333;
		}

		#head .logo{
			padding: 10px 15px 7px 15px;
			float: left;
			cursor: default;
			position: relative;
			z-index: 2;
			width: 250px;
			color: #FFF;
			font-size: 18px;
		}
		/**/
		#head .user{
			padding: 7px 15px;
			float: left;
			margin: 0 0 0 0px;
			cursor: default;
			position: relative;
			z-index: 2;
		}

		#head .user:hover{
			background-color: #FFF;
		}



		#head .user:hover .menu{
			display: block;
		}
		
		#head .user .avatar{
			display: inline-block;
			width: 31px;
			height: 31px;
			border-radius: 50%;
			background-color: #FFF;
			float: left;
			font-size: 25px;
			text-align: center;
			color: #999;
			overflow: hidden;
			padding-top: 3px;
			box-shadow: 0 0 3px 0 rgba(0,0,0,.5);
		}

		#head .user .name{
			float: left;
			color: #FFF;
			margin: 5px 0 0 7px;
		}

		#head .user:hover .name{
			color: #000;
		}

		#head .user .menu{
			position: absolute;
			left: 0;
			top: 45px;
			min-width: 240px;
			background-color: #FFF;
			display: none;
			box-shadow: 0 4px 3px 0 rgba(0,0,0,.2);
		}
		
		#head .user .menu .body{
			padding: 20px 15px 15px 15px;
		}

		#head .user .menu .foot{
			background-color: #EEEEEE;
			border-top: 1px solid #DDD;
			padding: 15px;
		}

		#head .user .menu .foot .logout{
			float: left;
		}

		#head .user .menu .foot .account{
			float: right;
		}
		/**/
	

		#head .logo{
			float: right;
			direction: rtl;
		}

		#head .user{
			float: right;
		}

		#head .user .menu{
			right: 0;
			left: auto;
		}

		#head .user .avatar{
			float: right;
		}

		#head .user .name{
			color: #fff;
			float: right;
			margin: 5px 7px 0 0;
		}

		#head .user .menu .body{
			direction: rtl;
		}
		/**/
</style>	
	
</head>
<body>
<!-- start head-menu  !-->
	<div id="head">
		<div class="logo">
			صفحه مدیریت
		</div>
		<div class="user">
			<span class="avatar">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			</span>
			<div class="name">مدیر</div>
			<div class="clearfix"></div>
			<div class="menu">
				<div class="body">
					<b>نام کاربری</b><br/>
					<span>ایمیل</span><br/><br/>
					<a href="" class="btn btn-sm btn-info">تغییر پسورد</a>

				</div>
				<div class="foot">
					<a href="" class="btn btn-default btn-sm logout">خروج</a>
					<a href="" class="btn btn-default btn-sm account">تنظیمات حساب</a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

<!-- end head-menu  !-->


<!-- start body  !-->
	<div id="body">
		<div class="wrapper">
			<!-- start top-body  !-->
			<div class="top-body">
				<!-- start-first-section !-->
				<div class="section-top-body">
					<div class="vertical-menu">
						<a href="{{ route('cms') }}"><i class="fa fa-home"></i>صفحه اصلی</a>
						<a href="{{ route('article.list') }}">
							<span aria-hidden="true" class="glyphicon glyphicon-th-list icon"></span>مطالب
							<span class="badge">{{{ Article::count() }}}</span>
						</a>
						<a href=""><span aria-hidden="true" class="glyphicon glyphicon-user icon"></span>کاربران</a>
						<a href=""><span aria-hidden="true" class="glyphicon glyphicon-cog icon"></span>تنظیمات مدیریت</a>
					</div>
				</div>
				<!-- end-first-section !-->
				<!-- start-second-section !-->

				<div class="section-top-body">
				<div class="content-list">
				@yield('content')
				</div>
				</div>
				<!-- end-second-section !-->
				<div class="clearfix"></div>
			</div>
			<!-- end top-body !-->
			<!-- start bottom-body  !-->
			<div class="bottom-body">
				<div class="wrapper">
				</div>
			</div>
			<!-- end bottom-body !-->
		</div>
	</div>