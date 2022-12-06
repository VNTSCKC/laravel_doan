@extends('layouts.admin')
@section('content')

<form action="{{route('xu-li-them-moi-nguoi-dung')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control"  placeholder="Username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input type="text" class="form-control"  placeholder="Username" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="tel" class="form-control"  placeholder="Số điện thoại" name="phone" pattern="(\+84|0)\d{9,10}">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" class="form-control"  placeholder="Username" name="address">
    </div>
    <div class="form-group">
        <label for="dateofbirth">Ngày sinh</label>
        <input placeholder="Select date" type="date" id="dateofbirth" class="form-control" name="dateofbirth">
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label">Hình ảnh</label>
        <img id="imageUser" src="#" alt="user image" hidden class="img-thumbnail"/>
        <input class="form-control" type="file" id="formFile" name="imageupload" onchange="readURL(this);">
    </div>
    <select class="form-select" aria-label="Default select example" name="position">
        <option selected>Open this select menu</option>
        <option value="admin">Quản trị viên</option>
        <option value="user">Người dùng</option>
    </select>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="trang_thai_dang_bai" id="flexCheckCheckedStatusPost" checked>
        <label class="form-check-label" for="flexCheckCheckedStatusPost" style="margin: 0px 0px 0px 0px" name="trang_thai_dang_bai">
          Cho phép đăng bài
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
