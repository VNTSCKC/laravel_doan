@extends('layouts.admin')
@section('content')
<h2>Tên danh mục: {{$catalogue->name}}</h2>
<a href="/admin/item/catalogue/danh-sach">< Back</a>
@endsection
