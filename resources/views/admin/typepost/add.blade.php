@extends('layouts.admin')
@section('content')
<h2>THÊM MỚI LOẠI BÀI ĐĂNG</h2>
@if (session('error'))
<div class="alert alert-warning">{{session('error')}}</div>
@endif
<form action="{{route('xu-li-them-moi-loai-bai-dang')}}" method="post">

    @csrf
    <div class="form-group">
        <label for="name">Tên loại bài đăng</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <!-- <div class="alert alert-danger">{{$error}}</div> -->
            <label style="color:red">{{$error}}</label>
        @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
<a href="/admin/type-post/danh-sach">< Quay lại</a>
@endsection
