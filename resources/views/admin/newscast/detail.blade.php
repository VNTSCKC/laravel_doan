@extends('layouts.admin')
@section('content')
<h1>Chủ đề: {{$newsCast->title}}</h1>
<p><strong>Loại bản tin: </strong>{{$newsCast->loaiBanTin->name}}</p>
<p><strong>Người đăng: </strong>{{$newsCast->nguoiDang->name}}</p>
<p><strong>Ngày đăng: </strong>{{$newsCast->created_at}}</p>
<h2>Nội dung</h2>
<div id="content"> {!!$newsCast->content!!}</div>
@endsection
