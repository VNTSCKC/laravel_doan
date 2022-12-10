@extends('layouts.admin')
@section('content')
<h1>Tên: {{$typePost->name}}</h1>
<p><strong>Mô tả: </strong>{{$typePost->description}}</p>
<a href="/admin/type-post/danh-sach">< Quay lại</a>
@endsection
