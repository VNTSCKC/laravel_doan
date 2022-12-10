@extends('layouts.admin')
@section('content')
<h1>Username: {{$account->username}}</h1>
<p>Họ tên: {{$account->name}}</p>
<p>Email: {{$account->email}}</p>
<p>Địa chỉ: {{$account->address}}</p>
<p>Ngày sinh: {{$account->dateofbirth}}</p>
@if ($account->position=="admin")
<p>Cạp bậc: Quản trị viên</p>
@else
<p>Cấp bậc: Người dùng</p>
@endif
@if ($account->status_post==true)
<p>Trạng thái đăng bài: Cho phép</p>
@else
<p>Trạng thái đăng bài: Không cho phép</p>
@endif
<a class="btn btn-primary" href="/admin/message/room/{{$account->id}}">Hộp thư</a>
<a href="/admin/user/danh-sach">< Back</a>
@endsection
