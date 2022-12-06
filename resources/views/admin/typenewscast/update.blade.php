@extends('layouts.admin')
@section('content')
<h2>CẬP NHẬT THÔNG TIN BẢN TIN</h2>

<form action="{{route('xu-li-cap-nhat-loai-ban-tin',['id'=>$typeNewsCast->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên loại bản tin</label>
        <input type="text" class="form-control"  placeholder="Tên" name="name" value="{{$typeNewsCast->name}}">
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{$typeNewsCast->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/admin/type-news-cast/danh-sach">< Back</a>
@endsection
