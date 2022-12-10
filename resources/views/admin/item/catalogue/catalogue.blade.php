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
        <a class="btn btn-success" href="{{route('them-moi-danh-muc-tim-do')}}">Thêm mới</a>
      <h4 class="card-title" style="margin: 10px 0 10px 0" >Danh mục tìm đồ</h4>
      <table class="table " id="catalogue-table">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col" >Chức năng</th>
          </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listCatelogue as $catalogue)
            <tr>
                <th scope="row">{{$catalogue->id}}</th>
                <td>{{$catalogue->name}}</td>
                <td><a class="btn btn-info" href="{{route('chi-tiet-danh-muc-tim-do',['id'=>$catalogue->id])}}">Chi tiết</a></td>
                <td><a class="btn btn-secondary" href="{{route('cap-nhat-danh-muc-tim-do',['id'=>$catalogue->id])}}">Sửa</a></td>
                <td><a class="btn btn-danger" href="/admin/item/catalogue/xoa/{{$catalogue->id}}">Xóa</a></td>
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
        $('#catalogue-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!!route('catalogue.datatable')!!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',},
                { data: 'name', name: 'name' },
                {data:'action', name: 'action'}
            ]
        });
    });
</script>
@endsection
