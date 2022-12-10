@extends('layouts.admin')

@section('content')
@if (session('error'))
<div class="alert alert-warning">{{session('error')}}</div>
@endif
<form action="{{route('xu-li-them-moi-loai-ban-tin')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bản tin</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
<a href="/admin/type-news-cast/danh-sach">< Back</a>
@endsection
