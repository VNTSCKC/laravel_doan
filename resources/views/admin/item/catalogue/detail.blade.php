@extends('layouts.admin')
@section('content')
<h1>Tên danh mục: {{$catalogue->name}}</h1>
<a href="/admin/item/catalogue/danh-sach">< Back</a>
@endsection
