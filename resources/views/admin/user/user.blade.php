@extends('layouts.admin')
@section('css')
<<<<<<< HEAD
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
=======

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
>>>>>>> minh_hung
@endsection
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
      <table class="table " id="users-table">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Họ tên</th>
            <th scope="col">SĐT</th>
            <th scope="col">Lần đăng nhập trước</th>
            <th scope="col">Hoạt động</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        {{-- <tbody>
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
        </tbody> --}}
      </table>
@endsection
@section('js')
<<<<<<< HEAD

=======
>>>>>>> minh_hung
<script src="https://code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('users.datatable') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'username', name: 'username' },
                { data: 'email', name: 'email' },
                { data: 'name', name: 'name' },
                { data: 'phone', name: 'phone' },
                { data:'last_seen', name:'last_seen'},
                { data:'login_status', name:'login_status'},
                { data:'action', name:'action'}
            ]
        });
    });
</script>
<<<<<<< HEAD
=======
<script>
    $(document).ready(function(){
        $('#users-table tbody').on("click",".delete-account",function(e){
            e.preventDefault(e);
            var href=$(this).attr('href')
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Bạn có chắc?',
            text: "Tài khoản này sẽ bị xóa!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Chắc, xóa đi!',
            cancelButtonText: 'Chưa, suy nghĩ đã!',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Đã xóa!',
            'Tài khoản đã được xóa.',
            'Hoàn tất'
            )

            window.location.replace(href)
            } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
            'Đã hủy thao tác',
            'Tài khoản còn nguyên :)',
            'Lỗi'
            )
            }
            })
        })
    })
</script>
>>>>>>> minh_hung
@endsection
