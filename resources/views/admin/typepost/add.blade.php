@extends('layouts.admin')
@section('content')

<form action="{{route('xu-li-them-moi-loai-bai-dang')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bài đăng</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/admin/type-post/danh-sach">< Back</a>
@endsection
