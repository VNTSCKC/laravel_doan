@extends('layouts.admin')
@section('content')
<form action="{{route('xu-li-cap-nhat-tai-khoan',['id'=>$account->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control"  placeholder="Username" name="username" value="{{$account->username}}" required>
    </div>
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input type="text" class="form-control"  placeholder="Username" name="name" value="{{$account->name}}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$account->email}}" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="tel" class="form-control"  placeholder="Số điện thoại" name="phone" pattern="(\+84|0)\d{9,10}" required value="{{$account->phone}}">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control"  placeholder="Username" name="address" value="{{$account->address}}">
    </div>
    <div class="form-group">
        <label for="dateofbirth">Ngày sinh</label>
        <input placeholder="Select date" type="datetime-local" id="dateofbirth" class="form-control" name="dateofbirth" value="{{$account->dateofbirth}}">
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <img id="imageUser" src="images/UserImages/{{$account->image}}" alt="user image" hidden class="img-thumbnail"/>
        <input class="form-control" type="file" id="formFile" name="imageupload" onchange="readURL(this);">
    </div>
    <select class="form-select" aria-label="Default select example" name="position">
        <option selected>Open this select menu</option>
        @if ($account->positon=="admin")
        <option value="admin" selected>Quản trị viên</option>
        <option value="user">Người dùng</option>
        @else
        <option value="admin">Quản trị viên</option>
        <option value="user" selected>Người dùng</option>
        @endif
    </select>
    <div class="form-check">
        @if ($account->status_post==true)
        <input class="form-check-input" type="checkbox" name="status_post" id="flexCheckChecked" checked name="trang_thai_dang_bai">
        @else
        <input class="form-check-input" type="checkbox" name="status_post" id="flexCheckChecked" >
        @endif
        <label class="form-check-label" for="flexCheckChecked" style="margin: 0px 0px 0px 0px" name="trang_thai_dang_bai">
            Cho phép đăng bài
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
  <a href="/admin/user/danh-sach">< Back</a>
@endsection
@section('js')
<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imageUser').attr('src', e.target.result).width(150).height(200);
      $('#imageUser').attr('hidden',false);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection
