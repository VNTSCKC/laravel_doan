@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
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
    <a class="btn btn-success" href="{{route('them-moi-loai-bai-dang')}}">Thêm mới</a>
<<<<<<< HEAD
      <h4 class="card-title" style="margin: 10px 0 10px 0">Loại bài đăng</h4>
=======
      <h4 class="card-title">Loại bài đăng</h4>
>>>>>>> minh_hung
      <table class="table " id="type-post-table">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listTypePost as $typePost)
            <tr>
                <th scope="row">{{$typePost->id}}</th>
                <td>{{$typePost->name}}</td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-loai-bai-dang',['id'=>$typePost->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-loai-bai-dang',['id'=>$typePost->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/type-post/xoa/{{$typePost->id}}">Xóa</a></td>
              </tr>
            @endforeach
        </tbody> --}}
    </table>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('#type-post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!route('typepost.datatable')!!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',},
                { data: 'name', name: 'name' },
                {data:'action', name: 'action'}
            ]
        });
    });
</script>
@endsection

