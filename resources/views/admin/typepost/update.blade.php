@extends('layouts.admin')
@section('content')
@if (session('error'))
<div class="alert alert-warning">{{session('error')}}</div>
@endif
<form action="{{route('xu-li-cap-nhat-loai-bai-dang',['id'=>$typePost->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bài đăng</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name" value="{{$typePost->name}}" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required>{{$typePost->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
<a href="/admin/type-post/danh-sach">< Back</a>
@endsection
