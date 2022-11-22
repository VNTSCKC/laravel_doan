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
<a href="/admin/news-cast/them-moi" class="btn btn-success">Thêm mới</a>
    <h4 class="card-title">Danh sách bài đăng</h4>
    <table class="table ">
    <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Người đăng</th>
        <th scope="col">Ngày đăng</th>
        <th scope="col">Loại bản tin</th>
        <th scope="col" colspan="3">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listNewsCast as $newsCast)
        <tr>
            <th scope="row">{{$newsCast->id}}</th>
            <td>{{$newsCast->title}}</td>
            <td>{{$newsCast->nguoiDang->name}}</td>
            <td>{{$newsCast->created_at}}</td>
            <td>{{$newsCast->loaiBanTin->name}}</td>
            <td><a class="btn btn-info" href="{{route('chi-tiet-ban-tin',['id'=>$newsCast->id])}}">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="{{route('cap-nhat-ban-tin',['id'=>$newsCast->id])}}">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/news-cast/xoa/{{$newsCast->id}}">Xóa</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection
