@extends('layouts.admin')
@section('content')

<form action="{{route('xu-li-them-moi-danh-muc-tim-do')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="username">Tên danh mục</label>
        <input type="text" class="form-control"  placeholder="Tên danh mục" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/admin/item/catalogue/danh-sach">< Back</a>
@endsection
