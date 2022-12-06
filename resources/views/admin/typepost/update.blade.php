@extends('layouts.admin')
@section('content')
<h2>CẬP NHẬT THÔNG TIN LOẠI BÀI ĐĂNG</h2>

<form action="{{route('xu-li-cap-nhat-loai-bai-dang',['id'=>$typePost->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bài đăng</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name" value="{{$typePost->name}}">
        @foreach ($errors->all() as $error)
            <!-- <div class="alert alert-danger">{{$error}}</div> -->
            <label style="color:red">{{$error}}</label>
        @endforeach
        @endif
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{$typePost->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/admin/type-post/danh-sach">< Back</a>
@endsection
