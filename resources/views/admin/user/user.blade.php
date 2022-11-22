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
        <a class="btn btn-success" href="{{route('them-moi-nguoi-dung')}}">Thêm mới</a>
      <h4 class="card-title">Danh sách người dùng</h4>
      <table class="table ">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Họ tên</th>
            <th scope="col">SĐT</th>
            <th scope="col">Lần đăng nhập trước</th>
            <th scope="col">Hoạt động</th>
            <th scope="col" colspan="3">Chức năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($listAccount as $account)
            <tr>
                <th scope="row">{{$account->id}}</th>
                <td>{{$account->username}}</td>
                <td>{{$account->email}}</td>
                <td>{{$account->name}}</td>
                <td>{{$account->phone}}</td>
                <td>
                    @if($account->last_seen)
                    {{Carbon\Carbon::parse($account->last_seen)->diffForHumans()}}
                    @else
                    Chưa đăng nhập lần nào
                    @endif
                </td>
                <td>
                    @if (Cache::has('user-is-online-'.$account->id))
                    <span class="text-success">Online</span>
                @else
                    <span class="text-secondary">Offline</span>
                @endif
                </td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-tai-khoan',['id'=>$account->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-tai-khoan',['id'=>$account->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/user/xoa/{{$account->id}}">Xóa</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
@endsection
