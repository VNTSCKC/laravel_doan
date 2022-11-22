<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Tìm Đồ Thất Lạc</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
	<link rel="stylesheet" href="css/weather-icon.css">
	<link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>

	<div class="www-layout">
        <section>
        	<div class="gap no-gap signin whitish medium-opacity">
                <div class="bg-image" style="background-image:url(images/resources/theme-bg.jpg)"></div>
                <div class="container">
                	<div class="row">
                        <div class="col-lg-8">
                            <div class="big-ad">
                                <figure><img src="images/logo2.png" alt=""></figure>
                                <h1>Welcome to the ChaoWeb</h1>
                                <div class="barcode">
                                    <figure><img src="images/resources/Barcode.jpg" alt=""></figure>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-4">
                            <div class="we-login-register">
                                @if(session('error'))
                                <div class="alert alert-warning">
                                    {{session('error')}}
                                </div>
                                @endif
                                @if(session('success_reverify_account'))
                                    <div class="alert alert-success">
                                        {{session('success_reverify_account')}}
                                    </div>
                                @endif
                                @if(session('verify_account'))
                                <div class="alert alert-success">
                                    {!!session('verify_account')!!}
                                </div>
                                @endif
                                @if(session('success_login'))
                                <div class="alert alert-success">
                                    {{session('success_login')}}
                                </div>
                                @endif
                                @if (session('success_verify_account'))
                                <div class="alert alert-success">
                                    {{session('success_verify_account')}}
                                </div>
                                @endif
                                @if(session('fail_verify_account'))
                                <div class="alert alert-warning">
                                {{session('fail_verify_account')}}
                                </div>
                                @endif
                                <div class="form-title">
                                    <i class="fa fa-key"></i>login
                                    <span>Tìm đồ thất lạc .</span>
                                </div>

                                <form class="we-form" action ="{{route('xu-ly-dang-nhap')}}" method="post">
                                  @csrf

                                    <input type="text" placeholder="Username" name = "username" class= " @error('username') is-invalid @enderror " >
                                    @error('username')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror



                                    <input type="password" placeholder="Password" name ="password" class= " @error('password') is-invalid @enderror " >
                                    @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                    <button type="submit" data-ripple="">Đăng nhập</button>
                                    <a class="forgot underline" href="#" title="">Quên mật khẩu</a>
                                </form>
                                <span> <a class="we-account underline" href="/dang-ky" title="">Đăng ký</a></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    	<script src="js/main.min.js"></script>
		<script src="js/script.js"></script>
</body>

</html>
