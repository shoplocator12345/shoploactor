<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Shop Locator</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7ZAdsxYc_U1xxyA3ga9gcmG260tW783I&libraries=places"
          async defer></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style type="text/css">
	body{
		font-family: 'Varela Round', sans-serif;
	}
	.form-control {
		box-shadow: none;		
		font-weight: normal;
		font-size: 13px;
	}
	.form-control:focus {
		border-color: #33cabb;
		box-shadow: 0 0 8px rgba(0,0,0,0.1);
	}
	.navbar-header.col {
		padding: 0 !important;
	}	
	.navbar {
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #dfe3e8;
		border-radius: 0;
	}
	.nav-link img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.navbar .navbar-brand, .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
		padding-left: 0;
		font-size: 20px;
		padding-right: 50px;
	}
	.navbar .navbar-brand b {
		font-weight: bold;
		color: #33cabb;		
	}
	.navbar .form-inline {
        display: inline-block;
    }
	.navbar .nav li {
		position: relative;
	}
	.navbar .nav li a {
		color: #888;
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
        padding-right: 35px;
		border-color: #dfe3e8;
        border-radius: 4px !important;
		box-shadow: none
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
		height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
		font-size: 19px;
    }
	.navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
		color: #fff;
		background: #33cabb;
		padding-top: 8px;
		padding-bottom: 6px;
		vertical-align: middle;
		border: none;
	}	
	.navbar .nav .btn-primary:hover, .navbar .nav .btn-primary:focus {		
		color: #fff;
		outline: none;
		background: #31bfb1;
	}
	.navbar .navbar-right li:first-child a {
		padding-right: 30px;
	}
	.navbar .nav-item i {
		font-size: 18px;
	}
	.navbar .dropdown-item i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar ul.nav li.active a, .navbar ul.nav li.open > a {
		background: transparent !important;
	}	
	.navbar .nav .get-started-btn {
		min-width: 120px;
		margin-top: 8px;
		margin-bottom: 8px;
	}
	.navbar ul.nav li.open > a.get-started-btn {
		color: #fff;
		background: #31bfb1 !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .nav .dropdown-menu li {
		color: #999;
		font-weight: normal;
	}
	.navbar .nav .dropdown-menu li a, .navbar .nav .dropdown-menu li a:hover, .navbar .nav .dropdown-menu li a:focus {
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .navbar-form {
		border: none;
	}
	.navbar .dropdown-menu.form-wrapper {
		width: 280px;
		padding: 20px;
		left: auto;
		right: 0;
        font-size: 14px;
	}
	.navbar .dropdown-menu.form-wrapper a {		
		color: #33cabb;
		padding: 0 !important;
	}
	.navbar .dropdown-menu.form-wrapper a:hover{
		text-decoration: underline;
	}
	.navbar .form-wrapper .hint-text {
		text-align: center;
		margin-bottom: 15px;
		font-size: 13px;
	}
	.navbar .form-wrapper .social-btn .btn, .navbar .form-wrapper .social-btn .btn:hover {
		color: #fff;
        margin: 0;
		padding: 0 !important;
		font-size: 13px;
		border: none;
		transition: all 0.4s;
		text-align: center;
		line-height: 34px;
		width: 47%;
		text-decoration: none;
    }	
	.navbar .social-btn .btn-primary {
		background: #507cc0;
	}
	.navbar .social-btn .btn-primary:hover {
		background: #4676bd;
	}
	.navbar .social-btn .btn-info {
		background: #64ccf1;
	}
	.navbar .social-btn .btn-info:hover {
		background: #4ec7ef;
	}
	.navbar .social-btn .btn i {
		margin-right: 5px;
		font-size: 16px;
		position: relative;
		top: 2px;
	}
	.navbar .form-wrapper .form-footer {
		text-align: center;
		padding-top: 10px;
		font-size: 13px;
	}
	.navbar .form-wrapper .form-footer a:hover{
		text-decoration: underline;
	}
	.navbar .form-wrapper .checkbox-inline input {
		margin-top: 3px;
	}
	.or-seperator {
        margin-top: 32px;
		text-align: center;
		border-top: 1px solid #e0e0e0;
    }
    .or-seperator b {
		color: #666;
        padding: 0 8px;
		width: 30px;
		height: 30px;
		font-size: 13px;
		text-align: center;
		line-height: 26px;
		background: #fff;
		display: inline-block;
		border: 1px solid #e0e0e0;
		border-radius: 50%;
		position: relative;
		top: -15px;
		z-index: 1;
    }
    .navbar .checkbox-inline {
		font-size: 13px;
	}
	.navbar .navbar-right .dropdown-toggle::after {
		display: none;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 768px){
		.navbar .dropdown-menu.form-wrapper {
			width: 100%;
			padding: 10px 15px;
			background: transparent;
			border: none;
		}
		.navbar .form-inline {
			display: block;
		}
		.navbar .input-group {
			width: 100%;
		}
		.navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
			display: block;
		}
	}
</style>
</head> 
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">ShopLocator</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
  
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		  <a class="nav-link"  href="/">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" style="margin-left:10px" href="/search/latest">Latest Product</a>
		</li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" style="margin-left:10px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Select Category
		  </a>
		  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" style="margin-left:10px" href="/search/general">General Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/cosmetic">Cosmetic Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/stationary">Stationary Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/garment">Garment Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/medical">Medical Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/confectionary">Confectionary Store</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/ice">Ice Cream Parlour</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/plumber">Plumber Shop</a>
			<a class="dropdown-item" style="margin-left:10px" href="/search/electrical">Electronic Shop</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="/search/all">All Products</a>
		  </div>
		</li>
		<li class="nav-item">
			<a class="nav-link" style="margin-left:10px" href="/contact">Contact Us</a>
		</li>
		<li class="nav-item" >
			<form class="form-inline" action="/search" method="GET" style="margin-left:40px" style="width:500px;">
				<input class="form-control mr-sm-2" style="width:280px;" type="search" name="search" placeholder="Search For Product..." aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right ml-auto">	
		@guest
		<li class="nav-item">
			<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
			<ul class="dropdown-menu form-wrapper">					
				<li>
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
								<input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>

						<div class="form-group row">
								<input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>

						<div class="form-group row">
								<div class="form-check" style="text-align:center">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
						</div>

						<div class="form-group row mb-0">
								<button type="submit" class="btn btn-primary btn-block" style="width: 100%;">
									{{ __('Login') }}
								</button>
								@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>	
								@endif

								<!-- @if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								@endif -->
						</div>
					</form>
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a onclick="AddUser()" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1">Sign up</a>
			<ul class="dropdown-menu form-wrapper">					
				<li>
					<form id="userCreate">
						<p class="hint-text">Fill in this form to create your account!</p>
						  <div class="form-group">
							<input type="text" class="form-control" id="name" placeholder="username" required="required">
						</div>
						  <div class="form-group">
							<input type="email" class="form-control" id="Cemail" placeholder="Email" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="Cpassword" placeholder="Password" required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="confirm" placeholder="Confirm Password" required="required">
						</div>
						<div class="form-group">
							<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms &amp; Conditions</a></label>
						</div>
						<input type="submit" class="btn btn-primary btn-block" value="Sign up">
					</form>
				</li>
			</ul>
		</li>
	 
	@else
		<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
	@endguest		
		
	</ul>
	  
	</div>
  </nav>
                                                                          
<br>
<?php
	if(Auth::user())
	{
		$userid=Auth::user()->id;
	}
	else {
		$userid=0;
	}
?>
<div class="container">
  @yield('content')
</div>


<!--FOOTER-->
<hr>
<footer class="page-footer font-small stylish-color-dark pt-4"  style="background:#e8e8e8">
  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a type="button" class="btn-floating btn-fb mx-1">
        <i class="fa fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a type="button" class="btn-floating btn-tw mx-1">
        <i class="fa fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a type="button" class="btn-floating btn-gplus mx-1">
        <i class="fa fa-google-plus"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a type="button" class="btn-floating btn-li mx-1">
        <i class="fa fa-linkedin"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a type="button" class="btn-floating btn-dribbble mx-1">
        <i class="fa fa-dribbble"> </i>
      </a>
    </li>
  </ul>
  <!-- Call to action -->
  <div class="footer-copyright text-center py-3" style="background:#CBCBC6" >© 2020 Copyright:
    <a href="#" style="color:#DC143C;">Shop Locator</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script>
	var APP_URL = "{{ url('/') }}";
  </script>


  	<script>
		  function AddUser()
		  {
			$(function () {
				$('#userCreate').on('submit', function (e) {
					var email,name,password,confirm;
					e.preventDefault();
							email            =  document.getElementById("Cemail").value;         
							name      		=  document.getElementById("name").value;         
							password          =  document.getElementById("Cpassword").value;         
							confirm        	 =  document.getElementById("confirm").value;      
						if(password==confirm)
						{   
								$.ajax({
									type: 'post',
									url: '/api/user',
									data:{
									'email'             : email,
									'name'              : name,
									'password'          : password,
									'confirm'           : confirm,
									},
									success: function ( ) {
										window.location.href = "/";
										$('#success').html("").addClass('alert').addClass('alert-success').delay(4000).fadeOut();
									}
								});
						}
						else
						{
								alert("Password And Confirm Password is not same");
						}
					})

			});
		  }
	</script>


<script>
	loadDayList();
    function loadDayList(){
        $.ajax({
              type: 'GET',
              url: APP_URL+'/api/LatestDay',
              success: function(result){   
              $('#LatestDay').html(result);
              }   
          });
    }
	<?php 
		if(Auth::user())
		{
	?>
			RecentList();
			function RecentList(){
				$.ajax({
					type: 'GET',
					url: APP_URL+'/api/RecentVisit/'+<?php echo $userid ?>,
					success: function(result){   
					$('#RecentVisit').html(result);
					}   
				});
			}
	<?php
		}
	?>
</script>

@if(Route::currentRouteName() == 'contact' )
<script>
	ContactUs();
	function ContactUs()
	{
		$(function () {
              $('#ContactUs').on('submit', function (e) {
                var name,email,message;
                e.preventDefault();
                    name            =  document.getElementById("name").value;         
                    email           =  document.getElementById("email").value;         
                    message         =  document.getElementById("message").value; 
                    $.ajax({
                      type: 'post',
                      url: '/api/contact/',
                      data:{
                        'name'               : name,
                        'email'              : email,
                        'message'            : message,
                      },
                      success: function ( ) {
						document.getElementById("ContactUs").reset();
                        $('#success').html('Your Meessage Has Been sent to Admin').addClass('alert').addClass('alert-success').show().delay(3000).fadeOut();
                      }
                    });

              });

          });
	}

	
</script>
@endif
@if(Route::currentRouteName() == 'map' )
{
 <script>
	var id = window.location.href.split('/').pop();
	function shop(lat,lng)
	{
		$.ajax({
                type: 'GET',
                url: APP_URL+'/api/UserShop/'+lat+'/'+lng,
                  success: function(result)
				  {
					alert(result.id);
				  }
				});
	}
	loadMap();
            function loadMap(){
                $.ajax({
                type: 'GET',
                url: APP_URL+'/api/map/'+id,
                  success: function(result){
					var ln = Object.keys(result).length;
					var sid;
					var infoWindow = new google.maps.InfoWindow();
					var myLatLng=new google.maps.LatLng(-37.7315907,145.0920073);
					var map = new google.maps.Map(
						document.getElementById('map'), {zoom: 15, center: myLatLng});
						var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
						var markers = [];
						for(var i=0;i<ln;i++)
						{	
							var data = markers[result[i].shop.id];
							var marker = new google.maps.Marker({
								position: new google.maps.LatLng(result[i].shop.lat,result[i].shop.lng),
								map: map,
								icon: iconBase + 'library_maps.png',
								title: result[i].title,
							});
							markers.push(marker);
							(function (marker, data) {
								var image=result[i].shop.image;
								var name=result[i].shop.name;
								sid=result[i].shop.id;
								var category=result[i].shop.category;
								google.maps.event.addListener(marker, "mouseover", function (e) {
									infoWindow.setContent('<div id="content" class="map-window"><div class="item">'+
									'<div class="item-img"><img style="height:100px;width:150px" class="js-mediaFit js-mediaFitCollected landscape-media loaded" src="/uploads/shops/'+image+'">'+
									'</div><div class="item-body"><div class="item-body-content">'+
									'<br><div class="item-header" style="text-align:center"><h6>'+name+'</h6></div>'+
									'<ul class="item-details" type="none">'+
									'</ul>'+
									'</div></div>');
									infoWindow.open(map, marker);
									
								});
							})(marker, data);
							google.maps.event.addListener(marker, "click", function (event) {
								var lat=this.position.lat();
								var lng=this.position.lng();
								window.location.href = "/shop/"+lat+"/"+lng;
							});
							 
						} 
					}  
               });
              } 
 </script>
 @endif
</body>

</html>