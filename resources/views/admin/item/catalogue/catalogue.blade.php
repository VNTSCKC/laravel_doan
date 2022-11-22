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
        <a class="btn btn-success" href="{{route('them-moi-danh-muc-tim-do')}}">Thêm mới</a>
      <h4 class="card-title">Danh mục tìm đồ</h4>
      <table class="table ">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col" colspan="3">Chức năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listCatelogue as $catalogue)
            <tr>
                <th scope="row">{{$catalogue->id}}</th>
                <td>{{$catalogue->name}}</td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-danh-muc-tim-do',['id'=>$catalogue->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-danh-muc-tim-do',['id'=>$catalogue->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/item/catalogue/xoa/{{$catalogue->id}}">Xóa</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
@endsection
