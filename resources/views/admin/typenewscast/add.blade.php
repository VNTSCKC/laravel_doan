@extends('layouts.admin')

@section('content')
<h2>THÊM MỚI LOẠI BẢN TIN</h2>

<form action="{{route('xu-li-them-moi-loai-ban-tin')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bản tin</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name">
        @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="margin: 0px 0px 10px 0">Xác nhận</button>
</form>
<a href="/admin/type-news-cast/danh-sach">< Quay lại</a>
@endsection
