<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Đăng ký tài khoản</title>

    <!-- Icons font CSS-->
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">

                <div class="card-body">
                    <h2 class="title">Đăng ký tài khoản</h2>
                    <form action="{{route('xu-li-dang-ky')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Họ Tên" name="name" required>
                            @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Tên đăng nhập" name="username" required>
                            @error('username')
                                    <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" required>
                            @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Mật khẩu" name="password" required>
                            @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Số điện thoại" name="phone" required>
                            @error('phone')
                                    <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Đăng ký</button>
                            <span> <a style="text-decoration: none" class="btn btn--pill btn--green"  href="/dang-nhap" title="">Đăng nhập</a></span>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
