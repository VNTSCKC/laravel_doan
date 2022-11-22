@extends('layouts.admin')
@section('content')
@if (session('success_add'))
<div class="alert alert-success">
    {{session('success_add')}}
</div>
@endif
@if (session('success_update'))
<div class="alert alert-primary">
    {{session('success_update')}}
</div>
@endif
@if (session('success_delete'))
<div class="alert alert-warning">
    {{session('success_delete')}}
</div>
@endif
<a href="/admin/post/them-moi" class="btn btn-success">Thêm mới</a>
    <h4 class="card-title">Danh sách bài đăng</h4>
    <table class="table ">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Người đăng</th>
        <th scope="col">Ngày đăng</th>
        <th scope="col">Địa điểm nhặt(mất)</th>
        <th scope="col" colspan="3">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listPost as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->nguoiDang->name}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->location}}</td>
            <td><a class="btn btn-info" href="{{route('chi-tiet-bai-dang',['id'=>$post->id])}}">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="{{route('cap-nhat-bai-dang',['id'=>$post->id])}}">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/post/xoa/{{$post->id}}">Xóa</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection
