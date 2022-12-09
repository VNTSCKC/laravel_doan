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

<a href="/admin/post/them-moi" class="btn btn-success">Thêm mới</a>
    <h4 class="card-title" style="margin: 10px 0 10px 0">Danh sách bài đăng</h4>

    <table class="table" id="post-table" >
    <thead class="table-dark">
        <tr>
        <th scope="col">STT</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Người đăng</th>
        <th scope="col">Loại bài đăng</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Ngày đăng</th>
        <th scope="col">Chức năng</th>
        </tr>
    </thead>
    {{-- <tbody>
        @foreach ($listPost as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->nguoiDang->name}}</td>
           
            <td><a class="btn btn-info" href="{{route('chi-tiet-bai-dang',['id'=>$post->id])}}">Chi tiết</a></td>
            <td><a class="btn btn-secondary" href="{{route('cap-nhat-bai-dang',['id'=>$post->id])}}">Sửa</a></td>
            <td><a class="btn btn-danger" href="/admin/post/xoa/{{$post->id}}">Xóa</a></td>
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
        $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!route('post.datatable')!!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',},
                { data: 'title', name: 'title' },
                { data: 'user_post', name: 'user_post' },
                { data: 'type', name: 'type' },
                { data: 'catalogue', name: 'catalogue' },
                
                { data:'action', name:'action'}
            ]
        });
    });
</script>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!route('post.datatable')!!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',},
                { data: 'title', name: 'title' },
                { data: 'user_post', name: 'user_post' },
                { data: 'type', name: 'type'},
                { data: 'catalogue', name: 'catalogue' },
                { data: 'datetime', name: 'datetime' },
                { data:'action', name:'action'}
            ]
        });
    });
</script>
@endsection
