@extends('layouts.admin')
@section('content')
<h1>Tên: {{$typeNewsCast->name}}</h1>
<p><strong>Mô tả: </strong>{{$typeNewsCast->description}}</p>
<a href="/admin/type-news-cast/danh-sach">< Quay lại</a>
@endsection
