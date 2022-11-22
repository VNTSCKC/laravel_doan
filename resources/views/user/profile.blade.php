@extends('layouts.user')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="row justify-content-evenly" style="display:flex; justify-content:center;">

<div class="col-4">
<h2>EDIT PROFILE </h2>
        <form action="{{route('xu-li-cap-nhat-thong-tin-user',['id'=>$account->id])}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
        <label style="font-size:20px; color:black; opacity:0.8" for="formFile" class="form-label">Ảnh đại diện</label>
        </br>
        <p>

            @if (Auth::user()->image)
            <img id="imageUser"  src="{{ url('/') }}/images/UserImages/{{$account->image}}" style="width: 200px; height: 200px;border-top-right-radius:50%; border-bottom-left-radius:50%; border-top-left-radius:50%; border-bottom-right-radius:50%;" alt="user image" class="img-thumbnail"/>
            @else
            <img id="imageUser"  src="{{ url('/') }}/images/UserImages/avt.png" style="width: 200px; height: 200px;border-top-right-radius:50%; border-bottom-left-radius:50%; border-top-left-radius:50%; border-bottom-right-radius:50%;" alt="user image" class="img-thumbnail"/>
            @endif

        </p>
        <input class="form-control" type="file" id="formFile" name="imageupload" onchange="readURL(this);">
        </div>
</div>
    <div class="col-4">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif

            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="name">Họ tên</label>
                <input type="text" class="form-control"  placeholder="Họ tên" name="name" value="{{$account->name}}">

            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="email">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" readonly name="email" value="{{$account->email}}">
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

            <button type="submit" class="btn btn-primary">Cập nhật</button>

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
