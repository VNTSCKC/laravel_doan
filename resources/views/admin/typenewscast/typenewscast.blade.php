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
    <a class="btn btn-success" href="{{route('them-moi-loai-ban-tin')}}">Thêm mới</a>
      <h4 class="card-title">Loại bản tin</h4>
      <table class="table " id="type-news-cast-table">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listTypeNewsCast as $typeNewsCast)
            <tr>
                <th scope="row">{{$typeNewsCast->id}}</th>
                <td>{{$typeNewsCast->name}}</td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-loai-ban-tin',['id'=>$typeNewsCast->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-loai-ban-tin',['id'=>$typeNewsCast->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/type-news-cast/xoa/{{$typeNewsCast->id}}">Xóa</a></td>
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
        $('#type-news-cast-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!route('typenewscast.datatable')!!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',},
                { data: 'name', name: 'name' },
                {data:'action', name:'action'}
            ]
        });
    });
</script>
@endsection
