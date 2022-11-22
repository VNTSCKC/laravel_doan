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
    <a class="btn btn-success" href="{{route('them-moi-loai-bai-dang')}}">Thêm mới</a>
      <h4 class="card-title">Loại bài đăng</h4>
      <table class="table ">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col" colspan="3">Chức năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listTypePost as $typePost)
            <tr>
                <th scope="row">{{$typePost->id}}</th>
                <td>{{$typePost->name}}</td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-loai-bai-dang',['id'=>$typePost->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-loai-bai-dang',['id'=>$typePost->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/type-post/xoa/{{$typePost->id}}">Xóa</a></td>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection

