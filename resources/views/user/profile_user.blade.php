@extends('layouts.user')
@section('css')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
@section('content')
<h2>THÔNG TIN CÁ NHÂN </h2>

<div class="central-meta">

<div class="row justify-content-evenly" style="display:flex; justify-content:center;">

<div class="col-4">  
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
        <label style="font-size:20px; color:black; opacity:0.8" for="formFile" class="form-label">Ảnh đại diện</label>
        </br>
        <p>
        <img id="imageUser"  src="{{ url('/') }}/images/UserImages/{{$account->image}}" style="width: 200px; height: 200px;border-top-right-radius:50%; border-bottom-left-radius:50%; border-top-left-radius:50%; border-bottom-right-radius:50%;" alt="user image" class="img-thumbnail"/>
        <!-- </p>
        <input class="form-control" type="file" id="formFile" name="imageupload" onchange="readURL(this);">-->
        </div>
</div>
    <div class="col-4">
    <!-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif -->

            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="name">Họ tên</label>
                <input type="text" class="form-control"  placeholder="Họ tên" name="name" value="{{$account->name}}">

            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="email">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{$account->email}}">
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="phone">Số điện thoại</label>
                <input type="text" class="form-control"  placeholder="Số điện thoại" name="phone" pattern="(\+84|0)\d{9,10}" required value="{{$account->phone}}">
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="address">Địa chỉ</label>
                <input type="text" class="form-control"  placeholder="Địa chỉ" name="address" value="{{$account->address}}">
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="dateofbirth">Ngày sinh</label>
                <input placeholder="Chọn ngày sinh" type="datetime-local" id="dateofbirth" class="form-control" name="dateofbirth" value="{{$account->dateofbirth}}">
            </div>
            
            <!-- <button type="submit" class="btn btn-primary">Cập nhật</button> -->
          
          <a href="{{route('trang-chu-nguoi-dung')}}" style="margin: 0px 20px 0 20px" class="btn btn-outline-primary">< Quay lại</a>
          </form>

    </div>
</div>

@endsection
@section('js')
<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imageUser').attr('src', e.target.result).width(200).height(200);
      $('#imageUser').attr('hidden',false);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection