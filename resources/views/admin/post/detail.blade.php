@extends('layouts.admin')
@section('content')
<h1>Chủ đề: {{$post->title}}</h1>
<p><strong>Loại bài đăng: </strong>{{$post->loaiBaiDang->name}}</p>
<p><strong>Danh mục tìm đồ: </strong>{{$post->loaiDo->name}}</p>
<p><strong>Người đăng: </strong>{{$post->nguoiDang->name}}</p>
<p><strong>Địa điểm nhặt(mất): </strong>{{$post->location}}</p>
<p><strong>Ngày đăng: </strong>{{$post->created_at}}</p>
<h2>Nội dung</h2>
<div id="content"> {!!$post->content!!}</div>
@endsection
