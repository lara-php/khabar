<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	
	<title></title>
	<script type="text/javascript" src="{{{ asset('js/tabcontent/tabcontent.js') }}}"></script>
	<link rel="stylesheet" type="text/css" href="{{{ asset('js/tabcontent/template1/tabcontent.css') }}}" />
	<link rel="stylesheet"  href="{{{ asset('css/bootstrap.css') }}}" />
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/master.css') }}}" />
	<link rel="stylesheet" href="{{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}}">
	
	
</head>
<body>
<!-- start head-menu  !-->
	<div id="head-menu">
		<div class="wrapper">
			<div class="menu-head">
				<a href=" {{ route('index') }} " class="head-link"><i class="fa fa-home"></i>صفحه اصلی</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>سیاست</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>اقتصاد</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>جهان</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>تکنولوژی</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>آموزشی</a>
				<a href="" class="head-link"><i class="fa fa-sort-desc"></i>ورزشی	</a>		
			</div>
			<div class="logo-head">
				<a href=""><i class="fa fa-rss"></i></a>
				<a href=""><i class="fa fa-google-plus"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-facebook"></i></a>
			</div>
			<div class="clearfix"></div>
		</div>
		
	</div>
<!-- end head-menu  !-->
<!-- start logo  !-->
	<div id="logo">
		<div class="wrapper">
			<div class="login" id="register" >
				<a href="">ثبت نام</a>
			</div>
			<div class="login" id="login">
			
				{{ Form::open() }}
				
					{{ Form::text('username','',['placeholder'=>'نام کاربری']) }}
					{{ Form::password('password',['placeholder'=>'رمز عبور']) }}
					{{ Form::checkbox('remember') }} مرا به خاطر داشته باش
					{{ Form::submit('ورود') }}
					
				{{ Form::close() }}
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- end logo  !-->
<!-- start search  !-->
	<div id="search">
		<div class="wrapper">
			<div class="flash">

			</div>
			<div class="form-search">
				<form>
					<input type="text" placeholder="جستجو" name="search" />
					<i class="fa fa-search"></i>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<!-- end search  !-->
<!-- start body  !-->
	<div id="body">
		<div class="wrapper">
			<!-- start top-body  !-->
			<div class="top-body">
				<!-- start-first-section !-->
				<div class="section-top-body">
					<div class="vertical-menu">
						<a href=""><i class="fa fa-home"></i>خانه</a>
						<a href="">سیاست</a>
						<a href="">اقتصاد</a>
						<a href="">جهان</a>
						<a href="">تکنولوژی</a>
						<a href="">اموزشی</a>
						<a href="">ورزشی</a>
					</div>
				</div>
				<!-- end-first-section !-->
				<!-- start-second-section !-->
				
				<div class="section-top-body">
					@section('slide')
					<div class="slide">
						<div class="picture">
							<img src="{{{asset('images/f8cebf1c4db621e87a97b34d1d39b605_420_680.jpg')}}}">
						</div>
						<div class="title-images">
							<span></span>
						</div>
						<div class="describe-images">
							<span></span>
						</div> 
					</div>
					@show
					<!-- !-->
					@yield('content')
					<!-- !-->
					@section('tab')
					<div class="tab">
						<ul class="tabs">
							<li><a href="#view1" rel="view1">tab1 tab</a></li>
							<li><a href="#view2" rel="view2">tab2</a></li>
							<li><a href="#view3" rel="view3">tab3</a></li>
						</ul>
						<div class="tabcontents">
							<div id="view1" class="tabcontent">
								<img src="{{{ asset('images/ipad-reponsive.jpg')}}}">
								<span>Custom background colors or images can be easily set for every single page separately. A great collection of 30 colorful heading backgrounds is included in your download package!</span>
							</div>
							<div id="view2" class="tabcontent">
								متن 2
							</div>
							<div id="view3" class="tabcontent">
								متن 3
							</div>
						</div>
					</div>
					@show
					<!-- !-->
				</div>
				<!-- end-second-section !-->
				<!-- start-third-section !-->
				<div class="section-top-body">
					<div class="media">
						<h2>سایر رسانه ها</h2>
					</div>
					<!-- !-->
					<div class="popular">
						<h2>پر بازدیدها</h2>
					</div>
					<!-- !-->
					<div class="cascade-menu">
						<div class="cascade-menu-title"></div>
						<div class="cascade-menu-title"></div>
						<div class="cascade-menu-title"></div>
						<div class="cascade-menu-title"></div>
					</div>
					<!-- !-->
					<div class="technology-slide">
						<h2>تکنولوژی</h2>
						<img class="underline-technology" src="{{{ asset('images/index.png')}}}" />
						<div class="image">
							<img src="{{{ asset('images/8583474182_d12c0e063d_b_thumb.jpg')}}}">
						</div>
						<div class="describe-image">kkk</div>
					</div>
					<!-- !-->
					
					<!-- !-->
				</div>
				<!-- end-third-section !-->
				<!-- start-fourth-section !-->
				<div class="section-top-body">
					<div class="gallery">
						<h2>آلبوم عکس</h2>
						<img class="border" src="{{{ asset('images/border.png')}}}" />
						<div class="pic">
							<div class="img"><img src="{{{ asset('images/3844115347_1fef316b6a_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/7960454106_71f3872130_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/8661543366_a2069c084f_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/156204873_a05f7ad6de_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/8133641229_43214a7487_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/5338129355_6c2c866a96_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/5985170393_bcf1fb59f8_b_thumb.jpg')}}}" ></div>
							<div class="img"><img src="{{{ asset('images/8583474182_d12c0e063d_b_thumb.jpg')}}}" ></div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- !-->
					<div class="advertise">
						<h2>تبلیغات</h2>
					</div>
					<!-- !-->
					<div class="weather">
						<h2>آب و هوا</h2>
						
						
					</div>
					<!-- !-->
					<div class="counter">
						<h2>آمار بازدید</h2>
					</div>
					<!-- !-->
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- start-fourth-section !-->
			<!-- end top-body !-->
			<!-- start bottom-body  !-->
			<div class="bottom-body">
				<div class="wrapper">
				</div>
			</div>
			<!-- end bottom-body !-->
		</div>
	</div>
	<!-- end body !-->
	<!-- start footer !-->
	<div id="footer">
		<div class="wrapper">
			<!-- start top-footer !-->
			<div class="top-footer">
				<div class="menu-footer">
					<div class="content">
						<img src="{{{ asset('images/16_email.png')}}}">
						<span>منو</span>
					</div>
					<div class="mt">
						<div class="color">آرشیو</div>
						<div class="color">نقشه سایت</div>
						<div class="color">درباره ما</div>
						<div class="color">تماس با ما</div>
					</div>
				</div>
				<!-- !-->
				<div class="menu-footer">
					<div class="content">
						<img  src="{{{ asset('images/16_email.png')}}}">
						<span>منو</span>
					</div>
					<div class="mt">
						<div class="color">آرشیو</div>
						<div class="color">نقشه سایت</div>
						<div class="color">درباره ما</div>
						<div class="color">تماس با ما</div>
					</div>
				</div>
				<!-- !-->
				<div class="menu-footer">
					<div class="content">
						<img src="{{{ asset('images/16_email.png')}}}">
						<span>منو</span>
					</div>
					<div class="mt">
						<div class="color">آرشیو</div>
						<div class="color">نقشه سایت</div>
						<div class="color">درباره ما</div>
						<div class="color">تماس با ما</div>
					</div>
				</div>
				<!-- !-->
				<div class="menu-footer">
					<div class="content">
						<img src="{{{ asset('images/16_email.png')}}}">
						<span>بروز رسانی</span>
					</div>
					<div class="mt">
						
					</div>
				</div>
				<!-- !-->
				<div class="clearfix"></div>
			</div>
			<!-- end top-footer !-->
			<!-- start bottom-footer !-->
			<div class="bottom-footer">
				<span>کلیه حقوق این سایت محفوط می باشد.</span>
				<a href=""><i class="fa fa-arrow-circle-o-up"></i></a>
			</div>
			<!-- end bottom-footer !-->
		</div>
	</div>
	<!-- end footer !-->
</body>
</html>