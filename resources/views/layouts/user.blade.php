<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Website Tìm đồ thất lạc</title>
    @yield('css')
    <link rel="icon" href="{{asset('user/images/fav.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('user/css/main.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/weather-icons.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/toast-notification.css')}}">
	<link rel="stylesheet" href="{{asset('user/css/page-tour.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/responsive.css')}}">

</head>
<body>
<div class="wavy-wraper">
		<div class="wavy">
		  <span style="--i:1;">c</span>
		  <span style="--i:2;">h</span>
		  <span style="--i:3;">a</span>
		  <span style="--i:4;">o</span>
		  <span style="--i:5;">w</span>
		  <span style="--i:6;">e</span>
		  <span style="--i:7;">b</span>
		  <span style="--i:8;">.</span>
		  <span style="--i:9;">.</span>
		  <span style="--i:10;">.</span>
		</div>
	</div>
<div class="theme-layout">

	<div class="postoverlay"></div>

	@include('user.blocks.header')
    @include('user.blocks.menu')
    @include('user.blocks.main')

	<script src="{{asset('user/js/main.min.js')}}"></script>
	<script src="{{asset('user/js/jquery-stories.js')}}"></script>
	<script src="{{asset('user/js/toast-notificatons.js')}}"></script>
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script><!-- For timeline slide show -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script><!-- for location picker map -->
	<script src="{{asset('user/js/locationpicker.jquery.js')}}"></script><!-- for loaction picker map -->
	<script src="{{asset('user/js/map-init.js')}}"></script><!-- map initilasition -->
	{{-- <script src="{{asset('user/js/page-tourintro.js')}}"></script>
	<script src="{{asset('user/js/page-tour-init.js')}}"></script> --}}
	<script src="{{asset('user/js/script.js')}}"></script>
    @yield('js')
	{{-- <script>
		jQuery(document).ready(function($) {

			$('#us3').locationpicker({
			  location: {
			    latitude: -8.681013,
			    longitude: 115.23506410000005
			  },
			  radius: 0,
			  inputBinding: {
			    latitudeInput: $('#us3-lat'),
			    longitudeInput: $('#us3-lon'),
			    radiusInput: $('#us3-radius'),
			    locationNameInput: $('#us3-address')
			  },
			  enableAutocomplete: true,
			  onchanged: function (currentLocation, radius, isMarkerDropped) {
			    // Uncomment line below to show alert on each Location Changed event
			    //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
			  }
			});

		if ($.isFunction($.fn.toast)) {
			$.toast({
				heading: 'Welcome To ChaoWeb',
				text: '',
				showHideTransition: 'slide',
				icon: 'success',
				loaderBg: '#fa6342',
				position: 'bottom-right',
				hideAfter: 3000,
			});

			$.toast({
				heading: 'Information',
				text: 'Now you can full demo of pitnik and hope you like',
				showHideTransition: 'slide',
				icon: 'info',
				hideAfter: 5000,
				loaderBg: '#fa6342',
				position: 'bottom-right',
			});
			$.toast({
				heading: 'Support & Help',
				text: 'Report any <a href="#">issues</a> by email',
				showHideTransition: 'fade',
				icon: 'error',
				hideAfter: 7000,
				loaderBg: '#fa6342',
				position: 'bottom-right',
			});
		}

		});
</script> --}}

</body>


</html>
