@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-8">
        <h1>Chủ đề: {{$post->title}}</h1>
        @if ($post->founded)
        <span class="badge badge-success" style="background-color: rgb(13, 147, 13);color:white;">Đã tìm được</span>
        @else
        <span class="badge badge-secondary" style="background-color: rgb(111, 111, 111); color:white;">Chưa tìm thấy</span>
        @endif
        <p><strong>Loại bài đăng: </strong>{{$post->loaiBaiDang->name}}</p>
        <p><strong>Danh mục tìm đồ: </strong>{{$post->loaiDo->name}}</p>
        <p><strong>Người đăng: </strong>{{$post->nguoiDang->name}}</p>
        <p><strong>Địa điểm nhặt(mất): </strong>{{$post->location}}</p>
        <p><strong>Ngày đăng: </strong>{{$post->created_at}}</p>
        <h2>Nội dung</h2>
        <div id="content"> {!!$post->content!!}</div>
    </div>
    <div class="col-4">
        <h2>Danh sách tố cáo</h2>

            @if ($reports)
            @foreach ($reports as $report )
            <div class="row justify-content-around">
            <div class="col-4" style="width: 200px;  margin: auto;">
                {{$report->nguoiBaoCao->name}}
            </div>
            <div class="col-4" >
                <button type="button" class="btn btn-success btn-detail" id="{{$report->id}}"> Chi tiết</button>
            </div>
            <div style="height: 10px"></div>
            </div>
            @endforeach

            @else
            <p>Trống</p>
            @endif


    </div>
  </div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".btn-detail").click(function(){
            var id=$(this).attr('id');
           $.get('/admin/report/detail/'+id,function(data){
            Swal.fire(data.content)
           });
        })
    })
</script>
@endsection
